<?php
require "conn.php";
require "controller.php";

if(empty($_POST['email']) || empty($_POST['password'])){

    echo "All fileds required";
    
}else{
    $email = mysqli_real_escape_string($con,$_POST["email"]);
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM `admin` WHERE email = '$email' AND password = '$password' ";
    $run_query = mysqli_query($con,$sql)or die(mysqli_error($con));
    $count = mysqli_num_rows($run_query);

    if($count == 1){
        $row = mysqli_fetch_assoc($run_query);
        $_SESSION['adminData'] = array(
            'id' => $row['id'],
            'email' => $row['email'],
            'type' => $row['type'],
        );
        header('Location: ../admin-home.php');
    }else{

        echo 'user nor found. please check your details properly';
    }
        
}



?>