<?php
require 'config/database.php';

if(isset($_POST['submit'])){

    $title=filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description=filter_var($_POST['description'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$title){
        $_SESSION['add-category']="enter title";
    }
    else if(!$description){
        $_SESSION['add-category']="enter text";
    }

    if(isset($_SESSION['add-category'])){
         $_SESSION['add-category-data']=$_POST;
         header('location:'.ROOT_URL.'admin/add-category.php');
         die();
    }else{
        $query="INSERT INTO categories (title,description) VALUES('$title','$description')";
        $result=mysqli_query($connection,$query);

        if(mysqli_errno($connection)){
            $_SESSION['add-category']="plz add category";
            header('location:'.ROOT_URL.'admin/add-category.php');
            die();
        }else{
            $_SESSION['add-category-success']="new category is added";
            header('location:'.ROOT_URL.'admin/manage-category.php');
            die();
        }
    }

}