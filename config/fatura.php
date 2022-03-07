<?php

return [
    'ulke'                  => 'Türkiye',
    'il'                    => 'Diyarbakır',
    'ilce'                  => 'Bağlar',
    'adres'                 => 'Selahattin Eyyubi Mahallesi Şanlıurfa yolu 1.km Sanayi ve Teknoloji İl Müdürlüğü Hizmet Binası Kat:2 Bağlar/ Diyarbakır /TÜRKİYE',
    'email'                 => 'info@dtiosb.org',
    'unvan'                 => 'DİYARBAKIR TEKSTİL İHTİSAS ORGANİZE SANAYİ BÖLGESİ YÖNETİMİ',
    'vergiNo'               => env('FATURA_VERGI_NO', '3010573878'),
    'vergiDairesi'          => 'Gökalp',
    'telefon'               => \App\Helpers\Utils::getFormattedTelephoneNumber('904122383038'),

    'urn'                   => 'urn:mail:defaultgb@dtiosb.org',
    'eFaturaNoPrefix'       => env('EFATURA_CODE_PREFIX'),
    'eArsivNoPrefix'        => env('EARSIV_CODE_PREFIX'),
    'eXNoDatePrefix'        => env('EX_DATE_PREFIX'), // eFatura and eArsiv date prefix
    'aboneNoPadLength'      => 3,
    'aboneNoPadString'      => '0',
    'aboneNoPadDirection'   => STR_PAD_LEFT,

    // Fatura kesildikten sonra mail gönderilsin mi?
    'emailActive'           => env('FATURA_EMAIL_ACTIVE', true),

    'importPath'            => 'import/fatura',
    'logPaths'              => [
        'error'                 => 'FaturaRRE/:yil/:ay/:gun/:id_:type_error.log',
        'request'               => 'FaturaRRE/:yil/:ay/:gun/:id_:type_request.log',
        'response'              => 'FaturaRRE/:yil/:ay/:gun/:id_:type_response.log',
    ],
];
