<?php
   session_start();
   include("connection.php");
 

   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
     //something was posted
     $user_name = $_POST['username'];
     $password = $_POST['password'];
     
    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){
        //read from database
        $query="Select * from users where username='$user_name' limit 1";
        $result = mysqli_query($con,$query);

        if($result){
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);

                if($user_data ['password'] === $password){
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: admin/index.php");
                    die;
                }
            }
        }

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
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Login</title>
</head>
<body>
<section class="form-section">
        <div class="container form-section-container">
            <h1 class="sign-up-title">LogIn</h1>
     <div>
     <form method="POST">
              <label for="username">UserName</label>
              <input type="text" name="username">
              <label for="password">Password</label>
              <input type="password" name="password" >
              
              <button class="btn" type="submit" name="submit">login</button><br>
              <a class="already" href="login.php">Forget Password</a>
              <small class="msg-acc">Don't have an account?<a class="already" href="Signup.php">Create Account</a></small>
            </form>
     </div>
</body>
</html>