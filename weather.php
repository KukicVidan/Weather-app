<?php
session_start(); // Start the session to store data

$city = $_POST['city'];

function getWeatherData($city){
    $apiKey = "56cb44bfcd0f325fb8ba7a3ba55e397d";
    $apiURL = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";

    $response = file_get_contents($apiURL);
    if ($response === FALSE){
        return false;
    }
    $weatherData = json_decode($response, true);

    if(isset($weatherData['main'])){
        return $weatherData;
    } else {
        return false;
    }
}

$weatherData = getWeatherData($city);

if ($weatherData) {
    $_SESSION['weatherData'] = $weatherData;
} else {
    $_SESSION['error'] = "Unable to fetch weather data for {$city}.";
}

header("Location: result.php");
exit();
?>
