<?php

require 'config/database.php';

//get data if click in signup button
if(isset($_POST['submit'])){
    $username_email=filter_var($_POST['username_email'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password=filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //validate input values

if(!$username_email){
    $_SESSION['login']="eneter ur username or email";
}
else if(!$password){
    $_SESSION['login']="eneter ur password";
}
else{
    //fetch from database

    $fetch_user_query="SELECT * FROM users WHERE username='$username_email' OR email='$username_email'";
    $fetch_user_result=mysqli_query($connection,$fetch_user_query);

    if(mysqli_num_rows($fetch_user_result)==1){
        $user_record = mysqli_fetch_assoc($fetch_user_result);
        $db_password=$user_record['password'];

        //match the password
        if(password_verify($password,$db_password)){
          $_SESSION['user-id']= $user_record['id'];
       
          if($user_record['is_admin']==1){
            $_SESSION['user_is_admin'] = true;
          }

          header('location:' .ROOT_URL. 'admin/');
        }else{
            $_SESSION['login']="check inputs";
        }
    }else{
        $_SESSION['login']="users not found";
    }
}  

if(isset($_SESSION['login'])){
    $_SESSION['login-data']=$_POST;
    header('location:' .ROOT_URL. 'login.php');
    die();
}
}else{
    header('location:' .ROOT_URL. 'login.php');
    die();
}


