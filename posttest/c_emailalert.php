<?php 
header("Refresh: 600");
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

$sql="SELECT * FROM info";
$result=mysqli_query($conn,$sql);

if($result){
	while($row=mysqli_fetch_assoc($result)){
		$device_status =$row['device_status'];
    $users_id=$row['users_id'];
    $device_name =$row['device_name'];
    $device_id =$row['device_id'];

    if ($device_status == "Offline") {
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

						$mail -> Subject = "ALERT: $device_name has lost connection! ";
						$mail -> Body = "$firstname $lastname your $device_name with id #: $device_id has lost connection!";

						$mail -> send();
					}
				}
    }
  }

}
	


// Close MySQL connection
$conn->close();

?>