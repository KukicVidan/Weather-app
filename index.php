<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Weather app</title>
  <link rel="stylesheet" href="index.css">
  <link rel="icon" href="weather.png" type="image/x-icon">
  
  
</head>
<body>
  
  <div class="main-div">
    <h1>Search for the city 🌍</h1>
    <form method="POST" action="weather.php">
    <input class="city-input" name="city" type="text" placeholder="City name" required><br>
    <input class="btn" name="submit" type="submit" value="⛅Check Weather">
    </form>
  </div>
  
</body>
</html>