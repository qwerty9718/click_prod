<?php

namespace App\External_Api;

interface WeatherInterface
{
    public function getKeyCity();
    public function getTemperature();
}
