<?php

if (isset($_POST['crypto'])) {
    $crypto = $_POST['crypto'];

    // Api CoinGecko
    $apiUrl = 'Https://api.coingecko.com/api/v3/coins/{$crypto}';

    // response from api
    $cryptoData = file_get_contents($apiUrl);

    // Return data to the front
    echo $cryptoData;
}
?>