<?php
require "conn.php";
require "controller.php";

if(empty($_POST['email']) || empty($_POST['password'])){

  echo "<script> alert('All Fields Required');</script>";

  header('Location: ../login.php?error=All Fields Required');



}else{
    $email = mysqli_real_escape_string($con,$_POST["email"]);
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password' ";
    $run_query = mysqli_query($con,$sql)or die(mysqli_error($con));
    $count = mysqli_num_rows($run_query);

    if($count == 1){
        $row = mysqli_fetch_assoc($run_query);
        $_SESSION['userData'] = array(
            'id' => $row['id'],
            'fname' => $row['fname'],
            'lname' => $row['lname'],
            'phone' => $row['phone'],
            'email' => $row['email'],
        );
        header('Location: ../profile.php');
    }else{

      echo "<script> alert('User Not Found. Please Check Your Details Properly');</script>";
          header('Location: ../login.php?error=User Not Found. Please Check Your Details Properly');
    }

}



?>
