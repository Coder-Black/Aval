<?php
require "conn.php";
require "controller.php";

if(empty($_POST['email']) || empty($_POST['password'])){

    echo "<script>alert('All Fields Required')</script>";

}else{
    $email = mysqli_real_escape_string($con,$_POST["email"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

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
        header("Location:http://localhost/Aval/admin-home.php");
    }else{

        echo "<script> alert('User Not Found. Please Check Your Details Properly');</script>";
    }

}



?>
