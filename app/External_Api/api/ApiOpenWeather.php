<?php

namespace App\External_Api\api;

use App\External_Api\Connect;
use App\External_Api\WeatherInterface;

class ApiOpenWeather extends Connect implements WeatherInterface
{

    private string $city;

    public function __construct($city){
        $this->city = $city;
        $this->base_url = 'http://api.openweathermap.org/data/2.5/';
        $this->api_key = '2f2b3d6f61ce1c4cced1b588c8eb05df';
        parent::__construct();
        echo $this->getTemperature();
    }

    public function getKeyCity()
    {
        return $data_city = $this->setRequestToApi('find?q='.$this->city.'&type=like&APPID='.$this->api_key);
    }

    public function getTemperature()
    {
        try {
            $data = $this->getKeyCity();
            $lat = $data->list[0]->coord->lat;
            $lon = $data->list[0]->coord->lon;
            $request = $this->setRequestToApi('weather?lat='.$lat.'&lon='.$lon.'&APPID='.$this->api_key);
            return $this->city. ' Температура: '. $request->main->temp  - 273.15;
        }catch (\Exception $e){
            dd('Произошла ошибка');
        }

    }
}
