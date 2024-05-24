<?php

  $con= new mysqli('localhost','root','','capstone');

  if(!$con){
    die(mysqli_error($con));
  }
  
?>