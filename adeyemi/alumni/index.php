<?php

  session_start();

  $errors = array();

  // Establish database connection
  include('connection.php');
  
  $username = '';
  $password = '';
  
  // LOGIN USER
  if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";

    if (empty($username)) {
      array_push($errors, "Username is required");
    }
    if (empty($password)) {
      array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
      $password = md5($password);
      $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
      $results = mysqli_query($conn, $query);
      if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: home.php');
        exit();
      }else {
        array_push($errors, "Wrong username/password combination");
      }
    }
  }

        

?>





<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device=-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
    <title> ALUMNI DATABASE </title>

    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c7371cf87f.js" crossorigin="anonymous"></script>

</head>

<body>

<section id="landing">
  <div class="container conth">
    <div class="row rowh">
      <div class="col-md-7 landing7">
        <div class="midd">
          <p class="lan_img"><img src="images/logo-white.png"></p>
        </div>
      </div>

      <div class="col-md-5 landing5">
        <div class="midd">
          <form method="POST">
          <?php include('errors.php'); ?>
            <div class="login">
              <h1>Hi!</h1>
              <p class="wel">Welcome</p>
              <p class="wel1"> <input type="text" name="username" placeholder="Username"> </p>
              <p class="wel1"> <input type="password" name="password" placeholder="Password"> </p>
              <p> <button type="submit" class="login-btn" name="login_user">Login</button>
              <div class="row"> 
                <div class="col-md-6 signup">
                  <a href="register" > Sign Up </a> 
                </div>
                <div class="col-md-6 forgotpass">
                  <a href="#" > Forgot Password? </a> 
                </div>
              </div>
            </div>
          </form>
          <p>
          <?php 
            if (isset($error)) { echo $error; }
          ?>
          </p>

        </div>
      </div>
    </div>      
  </div>
</section>







</body>
</html>