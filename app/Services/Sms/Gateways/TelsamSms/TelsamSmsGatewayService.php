<?php

namespace App\Services\Sms\Gateways\TelsamSms;

use App\Services\Sms\Contracts\SmsGatewayContract;
use App\Services\Sms\Logger;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\SimpleCache\InvalidArgumentException;
use Throwable;

class TelsamSmsGatewayService implements SmsGatewayContract
{
    protected const URL = 'http://websms.telsam.com.tr/xmlapi/';

    /** @var string $logFileName */
    protected $logFileName;

    /**
     * @throws Throwable
     */
    protected function convertNormalizedPhoneNumberToTelsamCompatible(string $phoneNumber)
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
            config('sms.telsam.password'),
            config('sms.telsam.username'),
            config('sms.telsam.origin'),
        ];
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
        $phone = $this->convertNormalizedPhoneNumberToTelsamCompatible($phone);

        $postBody = '<?xml version="1.0"?>
<SMS>
  <authentication>
    <username>' . config('sms.telsam.username') . '</username>
    <password>' . config('sms.telsam.password') . '</password>
  </authentication>
  <message>
    <originator>' . config('sms.telsam.origin') . '</originator>
    <text>' . $message . '</text>
    <unicode></unicode>
  </message>
  <receivers>
    <receiver>' . $phone . '</receiver>
  </receivers>
</SMS>';

        $response = $this->request('sendsms', $postBody);

        $isError = strpos($response->getBody()->getContents(), '<status>ERROR</status>');

        if ($isError) {
            return false;
        }

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

        return $client->request(
            'POST',
            $path,
            [
                'body' => $postBody,
                'headers' => $requestHeader,
            ]
        );
    }
}
