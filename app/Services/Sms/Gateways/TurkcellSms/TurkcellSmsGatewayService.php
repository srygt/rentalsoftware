<?php

namespace App\Services\Sms\Gateways\TurkcellSms;

use App\Services\Sms\Contracts\SmsGatewayContract;
use App\Services\Sms\Logger;
use Closure;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\SimpleCache\InvalidArgumentException;
use Throwable;

class TurkcellSmsGatewayService implements SmsGatewayContract
{
    protected const URL = 'https://mesajussu.turkcell.com.tr/api/api/integration/v2/';

    public const CACHE_KEY_TOKEN = 'turkcell_token_data';

    // API Doc'dan: "24 saat geçerli bir oturum anahtarı (session token) alınması gerekmektedir"
    public const CACHE_EXPIRES_IN_SECONDS = 60 * 60 * 23;

    // API Doc'dan: "Kullanıcının aktif olmadığı süre 10 dakikayı aştığında oturum anahtarı yok olur."
    public const CACHE_ACTIVITY_TIMEOUT_IN_SECONDS = 9 * 60;

    public const HTTP_ERROR_STATUS_CODES = [
        '823' => 'IP is not allowed to call this service',
        '869' => 'Start time should be between 09:00 and 21:00',
        '883' => 'Brand code is must for this user',
        '900' => 'Password Expired',
        '902' => 'Authentication failed due to password',
        '903' => 'User is not active on payment system',
        '907' => 'Account locked',
        '908' => 'Authentication failed due to token',
        '913' => 'User does not exist.',
        '918' => 'Token timeout. Authenticate again',
        '920' => 'Internal Server Error!!!',
        '931' => 'This user can not use API. Please contact to Administrator',
        '932' => 'MSISDN count is less than minimum allowed count or greater than maximum allowed count',
        '938' => 'We are not in working hours',
        '971' => 'Invalid alpha numeric name',
        '982' => 'Account inactivated',
        '983' => 'Account suspended',
        '984' => 'Account deactivated',
        '985' => 'Account take over',
        '987' => 'Account msisdn changed',
        '996' => 'User is blacklisted',
    ];

    /** @var string $logFileName */
    protected $logFileName;

    /**
     * @throws Throwable
     */
    protected function convertNormalizedPhoneNumberToTurkcellCompatible(string $phoneNumber)
    {
        throw_if(
            10 > strlen($phoneNumber),
            new Exception('Given phone number has wrong format. Given phone: "' . $phoneNumber . '"')
        );

        return substr($phoneNumber, -10, 10);
    }

    /**
     * @inheritDoc
     */
    public static function getFieldsToCensor(): array
    {
        return [
            config('sms.turkcell.password'),
            config('sms.turkcell.username'),
            config('sms.turkcell.origin'),
        ];
    }

    /**
     * @throws GuzzleException
     */
    protected function fetchToken(): array
    {
        $postBody = [
            "username" => config('sms.turkcell.username'),
            "password" => config('sms.turkcell.password'),
        ];

        $response = $this->request(
            'login',
            $postBody
        );

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function getToken(): string
    {
        $tokenPayload = Cache::remember(
            self::CACHE_KEY_TOKEN,
            self::CACHE_EXPIRES_IN_SECONDS,
            $this->getTokenCacheData()
        );

        $tokenPayload['meta']['last_usage_time'] = Carbon::parse($tokenPayload['meta']['last_usage_time']);

        $lastUsageTime = $tokenPayload['meta']['last_usage_time'];
        $lastUsableTime = now()->subSeconds(self::CACHE_ACTIVITY_TIMEOUT_IN_SECONDS);

        if ($lastUsableTime->greaterThanOrEqualTo($lastUsageTime)) {
            $tokenPayload = $this->getTokenCacheData()();

            Cache::set(
                self::CACHE_KEY_TOKEN,
                $this->getTokenCacheData(),
                self::CACHE_EXPIRES_IN_SECONDS
            );
        }

        return $tokenPayload['data']['token'];
    }

    /**
     * @inheritDoc
     *
     * @throws GuzzleException
     * @throws Exception
     * @throws Throwable
     * @throws InvalidArgumentException
     */
    public function sendMessageToPhone(string $phone, string $message): bool
    {
        $phone = $this->convertNormalizedPhoneNumberToTurkcellCompatible($phone);

        $postBody = [
            "message" => $message,
            "sender" => config('sms.turkcell.origin'),
            "etkFlag" => false,
            "receivers" => [$phone],
        ];

        $requestHeaders = [
            'token' => $this->getToken(),
        ];

        $this->request(
            'sms/send/oton',
            $postBody,
            $requestHeaders
        );

        return true;
    }

    /**
     * @param $path
     * @param $postBody
     * @param array $requestHeader
     *
     * @return ResponseInterface
     *
     * @throws GuzzleException
     */
    protected function request($path, $postBody, array $requestHeader = []): ResponseInterface
    {
        $handler = HandlerStack::create();

        $this->logFileName = date('H-i-s') . '.log';

        $logFileName = $this->logFileName;
        $fieldsToCensor = self::getFieldsToCensor();

        $handler->push(Middleware::mapRequest(
            function (RequestInterface $request) use ($logFileName, $fieldsToCensor) {
                Logger::log(
                    $logFileName,
                    $fieldsToCensor,
                    $request
                );

                return $request;
            }
        ));

        $handler->push(Middleware::mapResponse(
            function (ResponseInterface $response) use ($logFileName, $fieldsToCensor) {
                Logger::log(
                    $logFileName,
                    $fieldsToCensor,
                    $response
                );

                $response->getBody()->rewind();
                return $response;
            }
        ));

        $client = new Client([
            'base_uri' => self::URL,
            'timeout' => 30.0,
            'handler' => $handler,
        ]);

        try {
            return $client->request(
                'POST',
                $path,
                [
                    'json' => $postBody,
                    'headers' => $requestHeader,
                ]
            );
        }
        catch (RequestException $e) {
            try {
                $httpStatusCode = $e->getHandlerContext()['http_code'] ?? 'MATGIS_NO_HTTP_CODE';

                Logger::log(
                    $logFileName,
                    $fieldsToCensor,
                    $this->getHttpStatusCodeErrorMessage($httpStatusCode)
                );
            } finally {
                throw $e;
            }
        }
    }

    protected function getHttpStatusCodeErrorMessage(string $httpStatusCode): string
    {
        $message = 'MATGIS-ERROR-MESSAGE: Http status code is "' . $httpStatusCode . '"';

        if (in_array($httpStatusCode, array_keys(self::HTTP_ERROR_STATUS_CODES))) {
            $description = ' (' . self::HTTP_ERROR_STATUS_CODES[$httpStatusCode] . ')';
        }
        else {
            $description = ' (Meaning is unknown by MATGIS, please look at Turkcell API Documentation)';
        }

        return $message . $description;
    }

    protected function getTokenCacheData(): Closure
    {
        return function () {
            return [
                'data' => $this->fetchToken(),
                'meta' => [
                    'last_usage_time' => now(),
                ],
            ];
        };
    }
}
