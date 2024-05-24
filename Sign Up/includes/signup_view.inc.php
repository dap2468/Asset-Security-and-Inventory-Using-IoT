<?php

declare (strict_types=1);



function check_signup_errors(){
  if (isset($_SESSION['errors_signup'])) {
    $errors= $_SESSION['errors_signup'];

    echo'<br>';
    echo'<br>';

    foreach ($errors as $error){
      echo '<p class = "form-error">'. $error. '</p>';
    }

    unset($_SESSION['errors_signup']);
  } else if(isset($_GET["signup"]) && $_GET["signup"]=="success"){
    header('location:../Log In/index.php');
  }
}