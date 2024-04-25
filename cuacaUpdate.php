<?php
        session_start();

        if (!isset($_SESSION['visitor_count'])) {
                $_SESSION['visitor_count'] = 1;
                } else {
                $_SESSION['visitor_count']++;
                // Delete the visitor count session variable
                //unset($_SESSION['visitor_count']);
        }

        $visitorCount = $_SESSION['visitor_count'];
?>

<!DOCTYPE html>
<html>
        <head>
                <title>AL RAFI </title>
                <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>
                <div class="topnav">
                        <a class="active" href="#" onclick="reloadPage()">Home</a>
                        <a href="contact_form.html">Contact</a>
                </div>
                <p>You are visitor number: <?php echo $visitorCount; ?></p>
                <header class="header">
                        <h1 class="header-title">AL RAFI</h1>
                        <form class="header-form">
                                <label for="location" class="header-form-label">Enter Location:</label>
                                <input type="text" id="location" name="location" class="header-form-input" placeholder="Your City" required>
                                <button type="submit" class="header-form-button">Get Weather</button>
                        </form>
                </header>
                <div class="weather">
                        <div class="weather-now">
                                <img src="locationicon.png" alt="Location Icon" class="location-icon" width="30" height="30">
                                <h2 class="header-icon-text">Current Location: Kuala Lumpur</h2>
                        </div>
                        <div id="weather-info" class="weather-info">
                                <div class="current-weather">
                                        <h2 class="current-weather-title">Current Weather</h2>
                                        <p id="temperature" class="current-weather-text">Temperature: </p>
                                        <p id="humidity" class="current-weather-text">Humidity: </p>
                                        <p id="wind" class="current-weather-text">Wind: </p>
                                </div>
                        </div>
                        <div class="activity-recommendation">
                                <h3 class="activity-recommendation-title">Activity Recommendation</h3>
                                <p id="activity-recommendation-text" class="activity-recommendation-text"></p>
                        </div>
                        <div class="weather-forecast">
                                <h3 class="weather-forecast-title">Weather Forecast</h3>
                                <article class="weather-item">
                                        <img src="http://openweathermap.org/img/wn//10d@4x.png" alt="Weather Icon" class="weather-icon">
                                        <h3 class="weather-forecast-day">Monday</h3>
                                        <p1 class="weather-forecast-temperature">30°C</p1>
                                </article>
                                <article class="weather-item">
                                        <img src="http://openweathermap.org/img/wn//10d@4x.png" alt="Weather Icon" class="weather-icon">
                                        <h3 class="weather-forecast-day">Tuesday</h3>
                                        <p1 class="weather-forecast-temperature">27°C</p1>
                                </article>
                                <article class="weather-item">
                                        <img src="http://openweathermap.org/img/wn//10d@4x.png" alt="Weather Icon" class="weather-icon">
                                        <h3 class="weather-forecast-day">Wednesday</h3>
                                        <p1 class="weather-forecast-temperature">36°C</p1>
                                </article>
                                <article class="weather-item">
                                        <img src="http://openweathermap.org/img/wn//10d@4x.png " alt="Weather Icon" class="weather-icon">
                                        <h3 class="weather-forecast-day">Thursday</h3>
                                        <p1 class="weather-forecast-temperature">36°C</p1>
                                </article>
                                <article class="weather-item">
                                        <img src="http://openweathermap.org/img/wn//10d@4x.png" alt="Weather Icon" class="weather-icon">
                                        <h3 class="weather-forecast-day">Friday</h3>
                                        <p1 class="weather-forecast-temperature">26°C</p1>
                                </article>
                        </div>
                </div>

                <script src="script.js"></script>
                <script src="script2.js"></script>
        </body>
</html>


