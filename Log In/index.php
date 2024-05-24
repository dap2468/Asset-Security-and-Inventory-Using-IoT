<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="main.css">
  </head>

  <body>

    <form action="includes/login.inc.php" method="post">
      <h1> Login</h1>

      <div class="fields">
        <input required id="username" type="text" name="username" placeholder="Username">
      </div>

      <div class="fields">
        <input required id="pwd" type="password" name="pwd" placeholder="Password">
      </div>

      <input required type="submit" value="Login" class="log-in-button">

      <?php
      check_login_errors();
      ?>

      <div class="signup">
        Don't have an account?
        </br>
        <a class= "link" href="http://localhost/Sign%20Up/index.php">Sign Up</a>
      </div>

      <div class="signup">
        More information?
        </br>
        <a class="link" href="http://localhost/About%20Project/about.php">About Project</a>
      </div>
    </form>

  </body>

</html>