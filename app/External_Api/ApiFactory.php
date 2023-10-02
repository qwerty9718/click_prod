<?php

namespace App\External_Api;



use App\External_Api\api\ApiAccuWeather;
use App\External_Api\api\ApiOpenWeather;

class ApiFactory implements WeatherFactory
{

    private string $api;
    private string $city;

    public function __construct($api,$city)
    {
        $this->api = $api;
        $this->city = $city;

        switch ($api) {
            case "open-weather":
                $this->createOpenWeather();
                break;
            case "accu-weather":
                $this->createAccuWeather();
                break;
            default: echo 'такого api нет';
        }
    }

    public function createOpenWeather(): ApiOpenWeather
    {
        return new ApiOpenWeather($this->city);
    }

    public function createAccuWeather(): ApiAccuWeather
    {
        return new ApiAccuWeather($this->city);
    }
}
