
<?php
  header("Refresh: 5");
  include 'includes/connect.php';
  $login=$_GET['login'];

  $sql="SELECT * FROM users WHERE id = $login";
  $result=mysqli_query($con,$sql);
  if($result){
    $row=mysqli_fetch_assoc($result);
    $firstname=$row['firstname'];
    $lastname =$row['lastname'];
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv ="X-UA-Compatible" content = "IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
  <link rel="stylesheet" href="dis.css">
  
  <title>Dashboard</title>

  

</head>
<body>
  <div  class = "container my-5"class="container">
    
    <div>
      <?php
        echo'<h1 class= "welcome"> Welcome Back, '.$firstname.'</h1>';
        echo '<button class="sub"><a href="user.php?login='.$login.'" class="text">Add User</a>';

        echo'<button class="done"><a href="logout.php?" class="text">Sign Out</a></button>';
      ?>
    </div>
  
 
  <table class="table">
    <thead>
      <tr>
        <th scope="col">SL #</th>
        <th scope="col">Name</th>
        <th scope="col">ID</th>
        <th scope="col">Connection</th>
        <th scope="col">Power</th>
        <th scope="col">Movement</th>
        <th scope="col">Last Updated</th>
        <th scope="col">Operation</th>
      </tr>
    </thead>
    <tbody>

    <?php
      $sql="SELECT * FROM info WHERE users_id = $login";
      $result=mysqli_query($con,$sql);
      if($result){
        
        while($row=mysqli_fetch_assoc($result)){
          $id=$row['id'];
          $device_name =$row['device_name'];
          $device_id =$row['device_id'];
          $device_status =$row['device_status'];
          $power_status =$row['power_status'];
          $movement_status =$row['movement_status'];
          $last_updated =$row['last_updated'];
          echo'<tr>
            <th scope="row">'.$id.'</th>
            <td>'.$device_name.'</td>
            <td>'.$device_id.'</td>
            <td>'.$device_status.'</td>
            <td>'.$power_status.'</td>
            <td>'.$movement_status.'</td>
            <td>'.$last_updated.'</td>
            <td>
            <button class="btn btn-primary"><a href="update.php?updateid='.$id.'&login='.$login.'" class="text-light">Update</a></button>
              <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'&login='.$login.'" class="text-light">Delete</a></button>
            </td>
          </tr>';
        }
      }
    ?>
      
    </tbody>
  </table>
  </div>
</body>
</html>