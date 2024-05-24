<?php 
header("Refresh: 5");
$hostname = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "capstone"; 

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) 
{ 
	die("Connection failed: " . mysqli_connect_error()); 
} 

else {
echo "Database connection is OK<br>"; }


$sql="SELECT * FROM info";
$result=mysqli_query($conn,$sql);

if($result){
	while($row=mysqli_fetch_assoc($result)){
		$last_updated=$row['last_updated'];
		$device_status =$row['device_status'];
    $id =$row['id'];

    $current_time = date('Y-m-d H:i:s'); 
    echo $current_time;
    
    $start_datetime = new DateTime($last_updated); 
    $diff = $start_datetime->diff(new DateTime($current_time)); 
    
    echo $diff->days.' Days total<br>'; 
    echo $diff->y.' Years<br>'; 
    echo $diff->m.' Months<br>'; 
    echo $diff->d.' Days<br>'; 
    echo $diff->h.' Hours<br>'; 
    echo $diff->i.' Minutes<br>'; 
    echo $diff->s.' Seconds<br>';

    $total_minutes = ($diff->days * 24 * 60); 
    $total_minutes += ($diff->h * 60); 
    $total_minutes += $diff->i; 
    
    echo 'Diff in Minutes: '.$total_minutes;

    if((intval($total_minutes)-420)<10){
      echo 'less than';
      $sql="update info set id =$id, device_status ='Online' where id=$id";
    }
    else{
      echo ' greater than';
      $sql="update info set id =$id, device_status ='Offline' where id=$id";

    }

    if ($conn->query($sql) === TRUE) {
      echo "Values inserted in MySQL database table.";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
	}
}
	


// Close MySQL connection
$conn->close();

?>