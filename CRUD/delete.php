<?php
include'includes/connect.php';
$login=$_GET['login'];

if(isset($_GET['deleteid'])){
  $id=$_GET['deleteid'];

  $sql="DELETE FROM info where id=$id";
  $result=mysqli_query($con,$sql);
  if ($result) {
    header('location:display.php?login='.$login.'');
  }else {
    die (mysqli_error($con));
  }
}
?>