<?php

require_once "core/handle.php";
require_once "vendor/autoload.php";

$db = new PDO('mysql:host=localhost;dbname=dss_db', 'root', '');

$faker = Faker\Factory::create();

for ($i=0; $i < 50; $i++) {

    $name = $faker->name();
    $email = $faker->freeEmail();
    $pass = md5('easy');
    $state = mt_rand(1, 36);
    $lga = mt_rand(1, 774);

    $cost = $faker->randomNumber($nbDigits = 4);

    


    $sql = "INSERT INTO caterers (`name`,`email`,`password`,`state`,`location`)
            VALUES ('$name', '$email','$pass','$state','$lga')";

    $query = mysqli_query($con, $sql) or die(mysqli_error($con));
}

// for($i=0; $i < 50; $i++){
//     $name = $faker->name();
//     $cost = $faker->randomNumber($nbDigits = 4);
//     $details = $faker->text(50);

//     $id = mt_rand(1, 25);

//     $sql = "INSERT INTO meals (`user_id`,`name`,`details`,`price`)
//             VALUES ('$id', '$name','$details','$cost')";

//     $query = mysqli_query($con, $sql) or die(mysqli_error($con));


// }








?>