<?php

if (isset($_POST['city'])) {
    $city = $_POST['city'];
    $apiKey = '7e6d2b8dd901917d46edca5fea3a50bc';

    // Encode url
    $url = "http://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city) . "&appid=" . $apiKey;

    // get api response
    $weatherData = file_get_contents($url);

    // Give data to front
    echo $weatherData;
}

?>