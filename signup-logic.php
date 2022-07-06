<?php
require 'config/database.php';

if(isset($_POST['submit'])){

    $first_name=filter_var($_POST['firstname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $last_name=filter_var($_POST['lastname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $user_name=filter_var($_POST['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email=filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    $password=filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpasssword=filter_var($_POST['confirmpassword'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$first_name){
        $_SESSION['signup']="enter firstname";
    }
    else if(!$last_name){
        $_SESSION['signup']="enter lastname";
    }
    else if(!$user_name){
        $_SESSION['signup']="enter username";
    }
    else if(!$email){
        $_SESSION['signup']="enter email";
    }
    else{
        if($password!==$confirmpasssword){
            $_SESSION['signup']="password not match";
        }
        else{
            $hashed_password = password_hash($password,PASSWORD_DEFAULT);
    
            $user_check_query="SELECT * FROM users WHERE username='$username' OR email='$email'";
            $user_check_result=mysqli_query($connection,$user_check_query);
    
            if(mysqli_num_rows($user_check_result)>0){
                $_SESSION['signup']="username or email already exist";
            }else{
                header('location:' .ROOT_URL. 'login.php');
                die();
            }
        }
    }
    if(isset($_SESSION['signup'])){
        $_SESSION['signup-data']=$_POST;
        header('location:'.ROOT_URL. 'signup.php');
        die();
   }else{
     //save to database
     $query="INSERT INTO users (firstname,lastname,username,email,password) 
                              VALUES('$first_name','$last_name','$user_name','$email','$password')";
        $result=mysqli_query($connection,$query);

     $result = mysqli_query($con,$query);
     if(mysqli_errno($connection)){
        $_SESSION['signup']="plz add information";
        header('location:'.ROOT_URL. 'signup.php');
        die();
    }else{
        $_SESSION['signup-success']="Registration successful";
        header('location:'.ROOT_URL. 'login.php');
        die();
    }
}
}
