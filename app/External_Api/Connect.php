<?php

namespace App\External_Api;

use GuzzleHttp\Client;

abstract class Connect
{
    private Client $client;
    protected string $base_url;
    protected string $api_key;

    public function __construct(){
        $this->client = new Client([
            'base_uri' => $this->base_url,
            'timeout'  => 2.0,
        ]);
    }

    public function setRequestToApi($query){
        $response = $this->client->request('GET',$query);
        return json_decode($response->getBody()->getContents());
    }
}
