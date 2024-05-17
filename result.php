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
    <style>
        /* Simple styles for demonstration */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
        }
        .weather-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        h1 {
            margin-top: 0;
        }
        p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="weather-container">
        <h1>Weather Result</h1>
        <?php
        if ($error) {
            echo "<p>{$error}</p>";
        } elseif ($weatherData) {
            $city = $weatherData['name'];
            $temperature = $weatherData['main']['temp'];
            $humidity = $weatherData['main']['humidity'];
            $description = $weatherData['weather'][0]['description'];
            $windSpeed = $weatherData['wind']['speed'];

            echo "<h2>Weather in {$city}</h2>";
            echo "<p>Temperature: {$temperature}°C</p>";
            echo "<p>Humidity: {$humidity}%</p>";
            echo "<p>Condition: {$description}</p>";
            echo "<p>Wind Speed: {$windSpeed} m/s</p>";
        } else {
            echo "<p>No data available.</p>";
        }
        ?>
        <a href="index.php">Back to Search</a>
    </div>
</body>
</html>
