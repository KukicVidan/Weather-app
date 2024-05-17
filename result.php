<?php
session_start(); // Start the session to retrieve data

$weatherData = isset($_SESSION['weatherData']) ? $_SESSION['weatherData'] : null;
$error = isset($_SESSION['error']) ? $_SESSION['error'] : null;

session_unset(); // Clear session data after use
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Result</title>
    <link rel="stylesheet" href="result.css">
    <link rel="icon" href="weather.png" type="image/x-icon">
    
</head>
<body>
    <div class="weather-container">
        
        <?php
        if ($error) {
            echo "<p>{$error}</p>";
            echo " <a class='btn' href='index.php'>⬅️Back</a> ";
        } elseif ($weatherData) {
            $city = $weatherData['name'];
            $temperature = $weatherData['main']['temp'];
            $humidity = $weatherData['main']['humidity'];
            $description = $weatherData['weather'][0]['description'];
            $windSpeed = $weatherData['wind']['speed'];
            $icon = $weatherData['weather'][0]['icon'];
            $iconToDisplay = "http://openweathermap.org/img/wn/$icon.png";

            echo "<h1>Weather in <a href='https://en.wikipedia.org/wiki/{$city}' target='_blank' title='Learn more about city💭'>{$city}</a></h1>";
            echo "<p>Temperature: {$temperature}°C 🌡️</p>";
            echo "<p>Humidity: {$humidity}% 💧</p>";
            echo "<p>Condition: {$description}  <img src='{$iconToDisplay}' alt='Weather Image'></p>";
            echo "<p>Wind Speed: {$windSpeed} m/s 💨</p>";
            echo "<br><br>";
            echo "<a class='btn' href='index.php'>⬅️Back</a>";
            echo "<a class='btn' href='https://www.google.com/search?q=weather+in+  $city ' target='_blank' title='🗓️Weather for this week.'>More info ➡️</a>";
                
        } else {
            echo "<p>No data available.</p>";
            echo "<br><br>";
            echo " <a class='btn' href='index.php'>⬅️Back</a> ";
        }
        ?>
        
    </div>
</body>
</html>
