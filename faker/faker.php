<?php

require_once "../core/conn.php";
require_once "../vendor/autoload.php";
require_once "cities.php";
require_once "../core/hash.php";

$db = new PDO('mysql:host=localhost;dbname=fl_db', 'root', '');

$faker = Faker\Factory::create();


// print_r($cities);


for ($i=0; $i < 1000; $i++) {
    $day = $faker->dayOfMonth($max = 'now');

    $month = $faker->month($max = 'now');
    $year = '2018';

    $date = $year.'-'.$month.'-'.$day." ".$faker->time($format = 'H:i:s', $max = 'now');

    $airline = mt_rand(1, 8);
    $price = $faker->randomNumber($nbDigits = 5);
    $seats = $faker->randomNumber($nbDigits = 3);
    $flightCode = 'FL-'.Hasher::getHashedToken(5);

    $rN = mt_rand(0, 11);
    $rW = mt_rand(0, 23);

    $dcity = $jaCities[$rN];
    $dncity = $jaCities[$rN];


    $sql = "INSERT INTO flights (`aid`,`from`,`to`,`ddate`,`fcode`,`price`,`seats`)
    VALUES ('$airline','$dncity','$dcity','$date','$flightCode','$price','$seats')";

    $query = mysqli_query($con, $sql) or die(mysqli_error($con));
}


?>