# Click Task
данное приложение написано на Laravel 10 и подключается к сторонним Api ( AccuWeather  и OpenWeatherMap ) для получения погоды по выбранному городу 


## Использование
для запуска введите команду

```sh
composer install
```

Для получения погоды:
```sh
php artisan openWeatherMap:getWeather Tashkent
```

```sh
php artisan accuweather:getWeather London
```



## Тестирование
Если выдает ошибку значит исчерпан лимит бесплатных запросов : Нужно

Авторизоваться на сайте https://developer.accuweather.com/ или https://openweathermap.org/
получить токен и прокинуть в переменную $apiKey в (App\Console\Commands\AccuweatherCommand) или (App\Console\Commands\OpenWeatherMapCommand)

