<?php
if (isset($_POST['crypto'])) {
 $crypto = $_POST['crypto'];
 // Hacer la solicitud a la API de CoinGecko
 $apiUrl = "https://api.coingecko.com/api/v3/coins/{$crypto}";
 // Obtener la respuesta de la API
 $cryptoData = file_get_contents($apiUrl);
 // Devolver los datos al frontend
 echo $cryptoData;
}
?>