<?php

namespace App\External_Api;


interface WeatherFactory
{
    public function createOpenWeather():WeatherInterface;
    public function createAccuWeather():WeatherInterface;
}
