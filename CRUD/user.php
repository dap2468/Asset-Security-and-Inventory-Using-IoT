<?php
  include 'includes/connect.php';
  $login=$_GET['login'];

  if(isset($_POST['submit'])){
    $device_name=$_POST['device_name'];
    $device_id=$_POST['device_id'];
    $users_id=$login;
    $device_status="N/A";
    $power_status="N/A";
    $movement_status="N/A";

    $sql="INSERT INTO info (device_name,device_id,users_id,device_status,power_status,movement_status) VALUES ('$device_name','$device_id',$users_id,'$device_status','$power_status','$movement_status')";
    $result = mysqli_query($con,$sql);
    if ($result) {
      header('location:display.php?login='.$login.'');
    }else{
      die(mysqli_error($con));
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="first.css">
    
    <title>Add Device</title>
  </head>
  <body>
    <div class = "container my-5">
      <form method ="post">
        <p class="first">Add New Device</p>
        <div class="form-group">
          <label >Device Name</label>
          <input type="text" class="form-control" placeholder="Enter device name" name= "device_name" autocomplete="off">
        </div>
        <div class="form-group">
          <label >Device ID</label>
          <input type="number" class="form-control" placeholder="Enter Device ID" name= "device_id" autocomplete="off">
        </div>
        <button type="submit" class="sub" name="submit">Submit</button>
      </form>
    </div>

  </body>
</html>