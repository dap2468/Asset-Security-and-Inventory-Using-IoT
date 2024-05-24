<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

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

	//Send alert email
	if($power_status=="False"){
		$sql="SELECT * FROM info WHERE device_id = $device_id";
    $result=mysqli_query($conn,$sql);

		if($result){
			while($row=mysqli_fetch_assoc($result)){
				$users_id=$row['users_id'];
				$device_name =$row['device_name'];

				$sql="SELECT * FROM users WHERE id = $users_id";
    		$answer=mysqli_query($conn,$sql);
				if($answer){
					while($row=mysqli_fetch_assoc($answer)){
						$firstname=$row['firstname'];
						$lastname=$row['lastname'];
						$email=$row['email'];

						$mail = new PHPMailer (true);

						$mail -> isSMTP();
						$mail -> Host = 'smtp.gmail.com';
						$mail -> SMTPAuth = true;
						$mail -> Username = 'email.alerts.capstone.wms@gmail.com';
						$mail -> Password = 'yzhhbcuhvskglnhr';
						$mail -> SMTPSecure = 'ssl';
						$mail -> Port = 465;

						$mail -> setFrom('email.alerts.capstone.wms@gmail.com');

						$mail-> addAddress($email);

						$mail-> isHTML(true);

						$mail -> Subject = "ALERT: $device_name has lost power! ";
						$mail -> Body = "$firstname $lastname your $device_name with id #: $device_id has lost power!";

						$mail -> send();
					}
				}
			}
		}
	}

		//Send alert email
		if($movement_status=="True"){
			$sql="SELECT * FROM info WHERE device_id = $device_id";
			$result=mysqli_query($conn,$sql);
	
			if($result){
				while($row=mysqli_fetch_assoc($result)){
					$users_id=$row['users_id'];
					$device_name =$row['device_name'];
	
					$sql="SELECT * FROM users WHERE id = $users_id";
					$answer=mysqli_query($conn,$sql);
					if($answer){
						while($row=mysqli_fetch_assoc($answer)){
							$firstname=$row['firstname'];
							$lastname=$row['lastname'];
							$email=$row['email'];
	
							$mail = new PHPMailer (true);
	
							$mail -> isSMTP();
							$mail -> Host = 'smtp.gmail.com';
							$mail -> SMTPAuth = true;
							$mail -> Username = 'email.alerts.capstone.wms@gmail.com';
							$mail -> Password = 'yzhhbcuhvskglnhr';
							$mail -> SMTPSecure = 'ssl';
							$mail -> Port = 465;
	
							$mail -> setFrom('email.alerts.capstone.wms@gmail.com');
	
							$mail-> addAddress($email);
	
							$mail-> isHTML(true);
	
							$mail -> Subject = "ALERT: $device_name has been moved! ";
							$mail -> Body = "$firstname $lastname your $device_name with id #: $device_id has been moved!";
	
							$mail -> send();
						}
					}
				}
			}
		}
}


// Close MySQL connection
$conn->close();

?>