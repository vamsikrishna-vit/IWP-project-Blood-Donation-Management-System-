<!DOCTYPE html>
<html>
<body>
<?php
	session_start();
function validatesession()
{
	if(!isset($_SESSION['LAST_ACTIVITY']))
	{
		echo"please Login Again";
		exit("Session Expired Due To Your In activity");
	}
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 180))
	{
		session_unset();    
		session_destroy();  
		exit("Session Expired due to your Inactivity");
	}
	else
	{
		$_SESSION['LAST_ACTIVITY'] = time();
	}
}
validatesession();
?>
<?php
if( isset( $_POST['submit_form'] ) )
{
 function validate_data($data)
 {
  $data = trim($data);
  $data = stripslashes($data);
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
  return $data;    
 }
$fullname=validate_data($_POST['fullnameofdonor']);
$mobile=validate_data($_POST['mobileno']);
$email=validate_data($_POST['email']);
$age=validate_data($_POST['age']);
$gender=validate_data($_POST['gender']);
$blodgroup=validate_data($_POST['bloodgrp']);
$address=validate_data($_POST['address']);
$message=validate_data($_POST['message']);
$status=1;

 $host = 'localhost';
 $user = 'root';
 $pass = '';

 $con=mysqli_connect($host, $user, $pass);
 mysqli_select_db($con,'dbms');
$checksql="SELECT * from blooddonorsinfo where (FullName='$fullname' and MobileNumber='$mobile' and BloodGroup='$blodgroup')";
$res = mysqli_query($con,$checksql);
echo"hello";
		if(mysqli_num_rows($res) > 0)
		{
		
			echo"<script>
			var r=confirm('Error:You have already Registered as a Donor');
			if (r == true) {
				window.location.href = 'adddonor.php';
				}
			  </script>";

		
		}
		else
		{
			$sql="INSERT INTO  blooddonorsinfo(FullName,MobileNumber,EmailId,Age,Gender,BloodGroup,Address,Message,status) VALUES('$fullname','$mobile','$email','$age','$gender','$blodgroup','$address','$message','$status')";
			 mysqli_query($con,$sql);
			echo"<script>
			var r=confirm('Thank You are a Donor Now');
			if (r == true) {
				window.location.href = 'adddonor.php';
				}
			  </script>";
		}
}
?>
</body>
</html>