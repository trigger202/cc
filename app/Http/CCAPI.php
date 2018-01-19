<?php

namespace App\Http;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


/**
* Compliance Center API
*/
class CCAPI
{


	private $httpClient;

    public function request($url, $method = 'GET', $jwt_token, $data='array')
    {
        if (!$url)
        {
            return false;
        }

        $fullUrl = env('API_HOST').$url;

        $client = new Client();


        $res = $client->request($method, $fullUrl,[
            'headers'=>[
                'authorization' => 'Bearer '.$jwt_token
            ]
        ]);

        return $res;
    }



}



