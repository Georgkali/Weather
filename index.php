<?php

require_once "vendor/autoload.php";

use App\Api;
use App\Today;


if (!isset($_POST["city"])) {
    $url = "http://api.weatherapi.com/v1/forecast.json?key=6daf6ca9ad6445099bf80229212809&q=Riga&days=7&aqi=no&alerts=no";
} else {
    $url = "http://api.weatherapi.com/v1/forecast.json?key=6daf6ca9ad6445099bf80229212809&q={$_POST['city']}&days=7&aqi=no&alerts=no";
}

$api = new Api($url);
$today = new Today($url);
$today = $today->getData();
date_default_timezone_set('Europe/Riga');
$now = intval(date("H"));

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Weather</title>
</head>
<body>


<div class="card">
    <div class="card-body">
        <?php echo "<h1> {$api->data()->{'location'}->{'name'}} </h1>" ?>
        <form method="post">
            <label for="city">City:</label>
            <input type="text" name="city">
            <input type="submit" value="city">
        </form>


    </div>
</div>


<div class="days" style="display:flex; flex-direction: row">

    <div class="card">
        <div class="card-body">
            <?php
            echo "<p>Today:</p>";
            echo "<p>MAX: {$today[0]->{'day'}->{'maxtemp_c'}}</p>";
            echo "<p>MIN: {$today[0]->{'day'}->{'mintemp_c'}}</p>";
            echo "<p>AVG: {$today[0]->{'day'}->{'avgtemp_c'}}</p>";
            echo "<img src='{$today[0]->{'day'}->{'condition'}->{'icon'}}'/>";
            ?>
        </div>
    </div>
    <div class="card">
        <div class="card-body">

            <?php
            echo "<p>{$today[1]->{'date'}}</p>";
            echo "<p>MAX: {$today[1]->{'day'}->{'maxtemp_c'}}</p>";
            echo "<p>MIN: {$today[1]->{'day'}->{'mintemp_c'}}</p>";
            echo "<p>AVG: {$today[1]->{'day'}->{'avgtemp_c'}}</p>";
            echo "<img src='{$today[1]->{'day'}->{'condition'}->{'icon'}}'/>";
            ?>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <?php
            echo "<p>{$today[2]->{'date'}}</p>";
            echo "<p>MAX: {$today[2]->{'day'}->{'maxtemp_c'}}</p>";
            echo "<p>MIN: {$today[2]->{'day'}->{'mintemp_c'}}</p>";
            echo "<p>AVG: {$today[2]->{'day'}->{'avgtemp_c'}}</p>";
            echo "<img src='{$today[2]->{'day'}->{'condition'}->{'icon'}}'/>";
            ?>
        </div>
    </div>
</div>
<br><br>

<div class="today" style="display:flex; flex-direction: row">
    <div class="card">
        <div class="card-body">
            <?php
            echo "<p>Now:</p>";
            echo "<p>{$today[0]->{'hour'}[$now]->{'time'}}</p>";
            echo "<p>{$today[0]->{'hour'}[$now]->{'temp_c'}}</p>";
            echo "<img src='{$today[0]->{'hour'}[$now]->{'condition'}->{'icon'}}'/>";

            ?>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <?php
            echo "<p>+1 hour:</p>";
            echo "<p>{$today[0]->{'hour'}[$now+1]->{'time'}}</p>";
            echo "<p>{$today[0]->{'hour'}[$now+1]->{'temp_c'}}</p>";
            echo "<img src='{$today[0]->{'hour'}[$now+1]->{'condition'}->{'icon'}}'/>";
            ?>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <?php
            echo "<p>+2 hour:</p>";
            echo "<p>{$today[0]->{'hour'}[$now+2]->{'time'}}</p>";
            echo "<p>{$today[0]->{'hour'}[$now+2]->{'temp_c'}}</p>";
            echo "<img src='{$today[0]->{'hour'}[$now+2]->{'condition'}->{'icon'}}'/>";
            ?>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <?php
            echo "<p>+3 hour:</p>";
            echo "<p>{$today[0]->{'hour'}[$now+3]->{'time'}}</p>";
            echo "<p>{$today[0]->{'hour'}[$now+3]->{'temp_c'}}</p>";
            echo "<img src='{$today[0]->{'hour'}[$now+3]->{'condition'}->{'icon'}}'/>";
            ?>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <?php
            echo "<p>+4 hour:</p>";
            echo "<p>{$today[0]->{'hour'}[$now+4]->{'time'}}</p>";
            echo "<p>{$today[0]->{'hour'}[$now+4]->{'temp_c'}}</p>";
            echo "<img src='{$today[0]->{'hour'}[$now+4]->{'condition'}->{'icon'}}'/>";
            ?>
        </div>
    </div>
</div>


</div>


</body>
</html>