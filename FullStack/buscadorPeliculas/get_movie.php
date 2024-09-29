<?php

if (isset($_POST['title'])) {
    $title = urlencode($_POST['title']);
    $apiKey = 'TU_API_KEY'; // Reemplaza con tu clave API de OMDb

    // Hacer la solicitud a la API de OMDb
    $apiUrl = "http://www.omdbapi.com/?t={$title}&apikey={$apiKey}";

    // Get api response
    $movieData = file_get_contents($apiUrl);
    $movie = json_decode($movieData, true);

    // If movie is saved in the history
    if($movie['Response'] === true) {
        // Read Json file
        $history = json_decode(file_get_contents('movies.json'), true);

        // add movie to the history
        $history[] = [
            'title' => $movie['Title'],
            'year' => $movie['Year'],
            'director' => $movie['Director'],
            'actors' => $movie['Actors']
        ];

        // Save history update
        file_put_contents('movies.json', json_encode($history, JSON_PRETTY_PRINT));
    }

    // Return data to the front
    echo $movieData;
}

?>