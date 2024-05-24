<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
?>

<!DOCTYPE html>
<html>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="main.css">
  </head>

  <body>

    <form action="includes/signup.inc.php" method="post">
      <h1> Sign Up</h1>

      <div class="fields">
        <input required  id="firstname" type="text" name="firstname" placeholder="First Name">
      </div>
      <div class="fields">
        <input required  id="lastname" type="text" name="lastname" placeholder="Last Name">
      </div>

      <div class="fields">
        <input required id="email" type="text" name="email" placeholder="E-mail">
      </div>

      <div class="fields">
        <input required id="username" type="text" name="username" placeholder="Username">
      </div>

      <div class="fields">
        <input required id="pwd" type="password" name="pwd" placeholder="Password">
      </div>

      <input type="submit" value="Sign Up" class="signup-button">

      <?php
       check_signup_errors();
      ?>

      <div class="login">
        Already have an account?
      </br>
      <a class="link" href="http://localhost/Log%20In/index.php">Login</a>
      </div>

      <div class="login">
        More Information?
      </br>
      <a class="link" href="http://localhost/About%20Project/about.php">About Project</a>
      </div>

    </form>

   

  </body>

</html>