<?php
require 'config/database.php';

if(isset($_POST['submit'])){
  
    $title=filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body=filter_var($_POST['body'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    

    if(!$title){
        $_SESSION['add-post']="enter title";
    }
    else if(!$body){
        $_SESSION['add-post']="enter text";
    }

    if(isset($_SESSION['add-post'])){

            $_SESSION['add-post-data']=$_POST;
            header('location:'.ROOT_URL.'admin/add-post.php');
            die();
       
    }else{
        $query="INSERT INTO addposts (title,body) VALUES('$title','$body')";
        $result=mysqli_query($connection,$query);

        if(mysqli_errno($connection)){
            $_SESSION['add-post']="plz add post";
            header('location:'.ROOT_URL.'admin/add-post.php');
            die();
        }else{
            $_SESSION['add-post-success']="new post is added";
            header('location:'.ROOT_URL.'admin/index.php');
            die();
        }
    }

}