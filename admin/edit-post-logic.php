<?php
require 'config/database.php';

if(isset($_POST['submit'])){

    $id=filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
    $title=filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body=filter_var($_POST['body'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$title || !$body){
        $_SESSION['edit-post']="invalid input";
    }else{

        $query="UPDATE addposts SET title='$title', body='$body' WHERE id=$id LIMIT 1";
        $result=mysqli_query($connection,$query);

        if(mysqli_errno($connection)){
            $_SESSION['edit-post']="plz update";
        }else{
            $_SESSION['edit-post-success']="successfully update post";
        }
    }


}

header('location:' .ROOT_URL. 'admin/index.php');
die();