<?php
if (isset($_POST['title'])) {
    $title = urlencode($_POST['title']);
    $apiKey = '18982b10'; // Reemplaza con tu clave API de OMDb

    // Hacer la solicitud a la API de OMDb
    $apiUrl = "http://www.omdbapi.com/?t={$title}&apikey={$apiKey}";

    // Obtener la respuesta de la API
    $movieData = file_get_contents($apiUrl);
    $movie = json_decode($movieData, true);

    // Si la película se encuentra, guardarla en el historial
    if ($movie['Response'] === "True") {

        // Leer el archivo JSON
        $history = json_decode(file_get_contents('movies.json'), true);
 
        // Añadir la película al historial
        $history[] = [
            "title" => $movie['Title'],
            "year" => $movie['Year'],
            "director" => $movie['Director'],
            "actors" => $movie['Actors']
        ];

        // Guardar el historial actualizado en el archivo JSON
        file_put_contents('movies.json', json_encode($history, JSON_PRETTY_PRINT));
    }

    // Devolver los datos de la película al frontend
    echo $movieData;
}
?>