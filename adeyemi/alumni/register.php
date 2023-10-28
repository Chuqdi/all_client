<?php
$errors = array();

// Establish database connection
include('connection.php');

$username = '';
$password = '';
$email = '';
$user_role = '';
$deleted = '';


if (isset($_POST['reg_user'])){

  //Retrieve form data
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm_password']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);

  // Perform data validation and sanitization (you can add more validation logic)
  if(empty($username)) {array_push($errors, $_POST['username']);}
  if(empty($password)) {array_push($errors, $_POST['password']);}
  if(empty($email)) {array_push($errors, $_POST['email']);}
  // Check if passwords match
  if ($password != $confirmPassword) {array_push($errors, "Error: Passwords do not match!");}


  if (count($errors) == 0){
    // Generate password hash
    $hashedPassword = md5($password);

    // Construct and execute the SQL query
    $sql = "INSERT INTO users (username, password, email, user_role, deleted) VALUES ('$username', '$hashedPassword', '$email', 'user', '0')";
    mysqli_query($conn, $sql);

    header('location: index.php');
  }

}


// Close the database connection
mysqli_close($conn);


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
          <form method="POST" action="register.php">
          <?php include('errors.php'); ?>
            <div class="login">
              <h1>Hi!</h1>
              <p class="wel">User Registration Form</p>
              <p class="wel1"> <input type="text" name="username" placeholder="Username"> </p>
              <p class="wel1"> <input type="password" name="password" placeholder="Password"> </p>
              <p class="wel1"> <input type="password" name="confirm_password" placeholder="Confirm Password"> </p>
              <p class="wel1"> <input type="email" name="email" placeholder="Email"> </p>
              <p> <button type="submit" class="login-btn" name="reg_user">Sign Up</button> </p>
              <div class="row"> 
                <div class="col-md-12 signup">
                  <a href="/" > Already a user? &nbsp; Sign in here! </a> 
                </div>
                <!-- <div class="col-md-6 forgotpass"> -->
                  <!-- <a href="#" > Forgot Password? </a>  -->
                <!-- </div> -->
              </div>
            </div>
          </form>
          <?php
          if (isset($error)) {
              echo "<p>$error</p>";
          }
          ?>

        </div>
      </div>
    </div>      
  </div>
</section>







</body>
</html>