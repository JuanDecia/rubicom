<?php

if (isset($_POST['city'])) {
    $city = $_POST['city'];
    $apiKey = '7e6d2b8dd901917d46edca5fea3a50bc';

    // api
    $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}";

    // get api response
    $weatherData = file_get_contents($apiUrl);

    // Give data to front
    echo $weatherData;
}

?>