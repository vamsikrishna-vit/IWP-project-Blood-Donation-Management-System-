<!DOCTYPE html>
<html>
<head>
<title>Blood Bank Management System</title>
<style>
body, html {
  height: 100%;
  margin: 0;
}
.backimg{
background-image:url("adminimg.jpg");
height:100%;
width:100%;
padding-top:130px;
padding-left:580px;
}
.login{
border:1px solid white;
border-radius:5px;
background-color:white;
height:270px;
width:480px;
}
.atext{
font-size:20px;
margin-left:90px;
}
.inputbox{
border:1px solid #C8C8C8;
border-radius:5px;
width:300px;
height:40px;
}
.loginbutton{
border:1px solid white;
border-radius:5px;
width:250px;
height:40px;
background-color:#000099;
color:white;
font-size:20px;
}
</style>
</head>
<body >
<div class="backimg">
<span style="font-size:40px;color:white;"><b>BloodBank & Donor Management <br>System Sign in</b></span>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="login"><br><br>
<span class="atext">USERNAME<br></span>
<center><input class="inputbox" type="text" name="adminname"></center>
<br>
<span class="atext">PASSWORD<br></span>
<center><input class="inputbox" type="password" name="adminpwd" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" ><br><br>
<button  class="loginbutton" type="submit" name="login" >LOGIN</button>
</center>
</div>	
</div>
</form>
<?php

session_start();
session_unset();    
session_destroy();
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$er=0;
	if(empty($_POST["adminname"]) )
	{
		$er=1;
		echo"<script>alert('Please Enter the Username')</script>";
	
	}
	if(empty($_POST["adminpwd"]))
	{
		$er=1;
		echo"<script>alert('Please Enter the Password')</script>";
	}
	if($er==0)
	{
		$username=$_POST["adminname"];
		$password=md5($_POST["adminpwd"]);
		$sql = "SELECT * from admin where (UserName= '$username' and Password='$password')";
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$con=mysqli_connect($host, $user, $pass);
		mysqli_select_db($con,'dbms');
		$res = mysqli_query($con,$sql);
		if(mysqli_num_rows($res) > 0)
		{
		
			echo"<script>alert('Successfully Loggedin')</script>";
			session_start();
			$_SESSION['LAST_ACTIVITY']=time();
			header('Location:adminentered.php');
		
		}
		else
		{
			echo"<script>alert('Incorrect Password or Username')</script>";
		
		}
	
	}

}
?>
</body>
</html>




