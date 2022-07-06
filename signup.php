<?php
   session_start();
   include("connection.php");
   include("function.php");


   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
    //something was posted
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $user_name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($first_name) && !empty($last_name) && !empty($user_name) && !empty($password) && !is_numeric($user_name)){
        //save to database
        
        $query="insert into users (user_id,firstname,lastname,username,email,password) 
                           values('$user_id','$first_name','$last_name','$user_name','$email','$password')";
        mysqli_query($con,$query);

        header("Location: login.php");
        die;
    }
    else{
       echo "please enter valid information";
    }
   }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>SignUp</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body>
    <section class="form-section">
        <div class="container form-section-container">
            <h1 class="sign-up-title">Signup</h1>

             <?php
                 if(isset($_SESSION['signup'])):
             ?>

             <div class="alert-msg error">
                <p>
                    <?= $_SESSION['signup'];
                    unset($_SESSION['signup']); 
                    ?>
               </p>
               
             </div>

             <?php endif ?>
         
            <form method="POST" enctype="multipart/form-data">
              <label for="firstname">First Name</label>
              <input type="text" name="firstname"  >
              <label for="lastname">Last Name</label>
              <input type="text" name="lastname"  >
              <label for="username">UserName</label>
              <input type="text" name="username"  >
              <label for="emails">Email</label>
              <input type="text" name="email"  >
              <label for="passwords">Password</label>
              <input type="password" name="password" >
              <label for="confirmpassword">Confirm Password</label>
              <input type="password" name="confirmpassword" >
              <button class="btn" type="submit" name="submit">signup</button><br>
              <small class="msg-acc">Already have an account?<a class="already" href="login.php">Login</a></small>
            </form>
        </div>
    </section>
</body>
</html>
