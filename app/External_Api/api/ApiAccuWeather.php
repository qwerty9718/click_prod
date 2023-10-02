<?php

namespace App\External_Api\api;

use App\External_Api\Connect;
use App\External_Api\WeatherInterface;

class ApiAccuWeather extends Connect implements WeatherInterface
{
    private string $city;

    public function __construct($city){
        $this->city = $city;
        $this->base_url = 'http://dataservice.accuweather.com/';
        $this->api_key = 'r4NUDVSDAkvSYjpwGfUQwzZ99ULdVDbw';
        parent::__construct();
        $this->getTemperature();
    }

    public function getKeyCity()
    {
        return $data_city = $this->setRequestToApi('locations/v1/cities/search?apikey='. $this->api_key.'&q='.$this->city);
    }

    public function getTemperature()
    {
        try {

            $data_city = $this->getKeyCity();
            $key_city = $data_city[0]->Key;
            $result =  $this->setRequestToApi('forecasts/v1/daily/1day/'.$key_city.'?apikey='.$this->api_key);
            $min = round( ($result->DailyForecasts[0]->Temperature->Minimum->Value - 32) * 5/9 , 0);
            $max = round(($result->DailyForecasts[0]->Temperature->Maximum->Value - 32) * 5/9, 0);
            $average = ($max + $min) / 2;
            echo $this->city . ' средняя погода ' . ' : '.$average . ', Минимальная : '. $min. ', Максимальная : '. $max;

        }catch (\Exception $e){
            dd('Произошла ошибка');
        }
    }
}
