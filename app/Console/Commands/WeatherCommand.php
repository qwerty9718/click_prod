<?php

namespace App\Console\Commands;

use App\External_Api\ApiFactory;
use Illuminate\Console\Command;

class WeatherCommand extends Command
{
    protected $signature = 'app:weather {api?} {city?}';
    protected $description = 'Command description';


    public function handle()
    {
        $city = $this->argument('city');
        $api = $this->argument('api');
        if (!$city){$city = 'Tashkent';}
        if (!$api){$api = 'open-weather';}

        $weather = new ApiFactory($api,$city);
    }
}
