# Click Task
данное приложение написано на Laravel 10 и подключается к сторонним Api ( AccuWeather  и OpenWeatherMap ) для получения погоды по выбранному городу 


## Использование
для запуска введите команду

```sh
composer install
```

Для получения погоды:
```sh
php artisan app:weather open-weather tashkent

```

```sh
php artisan app:weather accu-weather london

```



## Тестирование
Если выдает ошибку значит исчерпан лимит бесплатных запросов : Нужно

Авторизоваться на сайте https://developer.accuweather.com/ или https://openweathermap.org/
получить токен и прокинуть в переменную $api_key в (App\FactoryWeather\api\ApiAccuWeather) или (App\FactoryWeather\api\ApiOpenWeather)

