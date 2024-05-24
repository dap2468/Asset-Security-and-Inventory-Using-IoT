<?php
  session_start();
  session_destroy();

  header('location: ../First Screen/first.php')
?>