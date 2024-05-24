<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $email = $_POST["email"];
  $username = $_POST["username"];
  $pwd = $_POST["pwd"];

  try {
      require_once 'dbh.inc.php';
      require_once 'signup_model.inc.php';
      require_once 'signup_contr.inc.php';

      //ERROR HANDLERS
      $errors =[];

      if (is_input_empty($firstname, $lastname, $username, $pwd, $email)) {
        $errors["empty_input"]="Fill in all fields.";
      }

      if (is_email_invalid($email)) {
        $errors["invalid_email"]="Invalid email used.";
      }

      if (is_username_taken($pdo, $username)) {
        $errors["username_taken"]="Username already taken.";
      }

      if (is_email_registered($pdo, $email)) {
        $errors["email_used"]="Email already used.";
      }

      require_once 'config_session.inc.php';

      if ($errors) {
        $_SESSION["errors_signup"]= $errors;

       

        header("Location: ../index.php");
        die();
      }

      create_user($pdo, $firstname, $lastname, $username, $pwd, $email);

      header("Location: ../index.php?signup=success");

      $pdo=null;
      $stmt=null;
      
      die();

  } catch (PDOException $e){
      die("Query failed: " . $e->getMessage());
  }
  
} else {
  header("Location: ../index.php");
  die();
}