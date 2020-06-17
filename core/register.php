<?php

include "controller.php";

// print_r($_POST);
// exit();

$fname   = mysqli_real_escape_string($con,$_POST["fname"]);
$lname   = mysqli_real_escape_string($con,$_POST["lname"]);
$email  = mysqli_real_escape_string($con,$_POST['email']);
$mobile = mysqli_real_escape_string($con,$_POST['phone']);
$pass1  = mysqli_real_escape_string($con,$_POST['password1']);
$pass2  = mysqli_real_escape_string($con,$_POST['password2']);
$addr  = mysqli_real_escape_string($con,$_POST['address']);



//pregmatch strings
$mname = "/^[A-Z][a-zA-Z ]+$/";
$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number = "/^[0-9]{11}+$/";



if(empty($lname) || empty($email) || empty($pass1) || empty($pass2)){

        echo "<script> alert('Please Fill All Fields');</script>";
        header('Location:../register.php?error=Please Fill All Fields');
        exit();
    }else {

    if(strlen($pass1) < 7 ){
        echo "<script> alert('Password Too Weak');</script>";
        header('Location:../register.php?error=Password Too Weak');
        exit();
    }
    if(strlen($pass2) < 7 ){
        echo "<script> alert('Password Too Weak');</script>";
        header('Location:../register.php?error=Password Too Weak');
        exit();
    }
    if($pass1 != $pass2){
        echo "Passwords don't match";
        header("Location:../register.php?error=Passwords don't match");
    }

    if(strlen($mobile) != 11){
        echo "<script> alert('Phone Number Must Be 11 Digits');</script>";
        header("Location:../register.php?error=Phone Number Must Be 11 Digits");
        exit();
    }

    //existing email address in our database
    $sql = "SELECT id FROM users WHERE email = '$email' LIMIT 1" ;
    $check_query = mysqli_query($con,$sql);
    $count_email = mysqli_num_rows($check_query);
    if($count_email > 0){
        echo "<script> alert('This Email is Tied To Another User, Please Try Another Email');</script>";
        header("Location:../register.php?error=This Email is Tied To Another User, Please Try Another Email");
                exit();
    } else {
        $pass1 = md5($pass1);
        $sql = "INSERT INTO `users` (`fname`,`lname`,`phone`,`email`, `password`, `address`)
                VALUES ('$fname','$lname','$mobile', '$email','$pass1', '$addr')";
        $run_query = mysqli_query($con,$sql)or die(mysqli_error($con));
        if($run_query){
            echo "<script> alert('<b> Registration Successfull..!</b>')

            <a href='../login.php'>Click here to login</a> ');</script>";
            header("Location:../register.php?action=Registration Successfull..! Proceed to Login");

        }
    }
    }



?>
