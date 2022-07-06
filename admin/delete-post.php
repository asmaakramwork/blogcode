<?php
require 'config/database.php';

if(isset($_GET['id'])){

    $id= filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);


    //delete
     $query="DELETE FROM addposts WHERE id=$id LIMIT 1";
     $result=mysqli_query($connection,$query);

     $_SESSION['delete-post-success']="post deleted successfully";
     
}

header('location:' .ROOT_URL. 'admin/index.php');
die();