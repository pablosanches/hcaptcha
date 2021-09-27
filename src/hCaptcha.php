<?php

namespace PabloSanches;

use Owl\Method as Http;

class hCaptcha
{
    const VERIFY_CHALLENGE_URI = 'https://hcaptcha.com/siteverify';

    private $secret_key = '';

    public function __construct($secretKey)
    {
        $this->secret_key = $secretKey;
    }

    public function getSecretKey()
    {
        return $this->secret_key;
    }

    public function challenge($responseToken, $remoteIp = false)
    {
        $data = [
            'secret' => $this->secret_key,
            'response' => $responseToken
        ];

        if ($remoteIp) {
            $data['remoteip'] = $remoteIp;
        }

        $request = new Http\Post(self::VERIFY_CHALLENGE_URI, [
            'data' => $data
        ]);

        $result = $request->send();
        return new Response($result);
    }
}