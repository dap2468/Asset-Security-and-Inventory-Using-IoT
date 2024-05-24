<?php 

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

// If values send by Arduino/NodeMCU are not empty then insert into MySQL database table


if(!empty($_POST['device_id']) && !empty($_POST['power_status']) && !empty($_POST['movement_status']) )
{
	$device_id = $_POST['device_id'];
	$power_status  = $_POST['power_status'];
  $movement_status  = $_POST['movement_status'];


	if ($power_status == "*" && $movement_status != "*") {
		// Update your tablename here
		$sql="update info set device_id =$device_id, movement_status ='$movement_status', last_updated = NOW() where device_id=$device_id";

		if ($conn->query($sql) === TRUE) {
			echo "Values inserted in MySQL database table.";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	if ($movement_status == "*" && $power_status != "*") {
		// Update your tablename here
		$sql="update info set device_id =$device_id,power_status ='$power_status', last_updated = NOW() where device_id=$device_id";

		if ($conn->query($sql) === TRUE) {
			echo "Values inserted in MySQL database table.";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;			
		}
	}

	if($power_status == "*" && $movement_status == "*") {
		// Update your tablename here
		$sql="update info set device_id =$device_id,last_updated = NOW() where device_id=$device_id";

		if ($conn->query($sql) === TRUE) {
			echo "Values inserted in MySQL database table.";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	if($power_status != "*" && $movement_status != "*") {
		// Update your tablename here
		$sql="update info set device_id =$device_id,power_status ='$power_status', movement_status ='$movement_status', last_updated = NOW() where device_id=$device_id";

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