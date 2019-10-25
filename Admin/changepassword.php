<!DOCTYPE html>
<html>
<head>
<title>Blood Bank Management System</title>
<style>
body, html {
  height: 100%;
  margin: 0;
}
.topheader{
display:inline-block;
position:fixed;
background-color:#181818;
height:50px;
top: 0;
left:0;
right:0;
padding-top:2px;
padding-right:80px;
padding-bottom:12px;
z-index: 9999;
}
a.links{
display:block;
color:#A9A9A9;
padding-left:15px;
text-decoration: none;
font-size:20px

}
a.links:hover{
color:white;
cursor:pointer;
}
.inline{
display:inline-block;
text-align:left;

}
.bottom{
position:relative;
background-color:#181818;
height:50px;
bottom: 0;
left:0;
right:0;
padding-top:2px;
text-align:center;
}
.projectname{
display:inline-block;
color:#A9A9A9;
text-align:left;
padding-right:150px;
padding-left:150px;
color:white;
font-size:25px;
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
.leftmenu{
background-color:black;
position:fixed;
bottom:0;
top:0;
margin-top:60px;
float:left;
width:700px:
bottom:0;
}

.leftmenu a{
	color: #A9A9A9;
  display: block;
  padding: 12px;
  text-decoration: none;
}
.leftmenu li{
	height:80px;
	list-style-type:none;
}
.leftmargin{
	margin-top:100px;
	margin-left:230px;
}
.leftmenu a:hover{
	color: white;
}
.leftmenu a.header {
  background-color: black;
  color: #787878;
  width:200px;
}
.card{
top:20px;
position:relative;
border:1px solid #F0F0F0;
border-radius:5px;
width:1000px;
padding:0;
border-spacing:0;
display:inline-block;
height:4500px;
}
.cardhead{
text-align:left;
font-size:20px;
border:1px solid #F0F0F0;
background-color:#FFFAF0;
border-top-left-radius:4px;
border-top-right-radius:4px;
padding:5px;
width:1200px;
}
tr{
	margin-top:20px;
	text-align:right;
}
.pswinput{
    width: 700px;
	height:35px;
	border-radius:4px;
	border:1px solid #989898;
	margin-left:20px;


}
.tdata{
font-size:20px;
margin-top:200px;
padding-top:35px;
padding-bottop:30px;	

}
.red{
	color:red;
	margin-right:50px;

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
.changepbutton{
	
	padding-top:40px;
	text-align:center;
	
}
</style>
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
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300))
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
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	validatesession();
validatesession();
function clean_data($fdata) {
  $fdata = trim($fdata);
  $fdata = stripslashes($fdata);
  $fdata = htmlspecialchars($fdata);
  return $fdata;
}
	$er=0;
	$valid=1;
	$auth=0;
	$pmat=0;
	if(empty($_POST["username"]) )
	{
		$er=1;
		echo"<script>alert('Please Enter the Username')</script>";
	
	}
	if(empty($_POST["curpsw"]))
	{
		$er=1;
		echo"<script>alert('Please Enter the Password')</script>";
	}
	if(empty($_POST["npsw"]))
	{
		$er=1;
		echo"<script>alert('Please Enter the New Password')</script>";
	}
	if(empty($_POST["cnpsw"]))
	{
		$er=1;
		echo"<script>alert('Please Enter the Confirm Password')</script>";
	}
	if($er==0)
	{
		$username=clean_data($_POST["username"]);
		$password=md5(clean_data($_POST["curpsw"]));
		$sql = "SELECT * from admin where (UserName= '$username' and Password='$password')";
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$con=mysqli_connect($host, $user, $pass);
		mysqli_select_db($con,'dbms');
		$res = mysqli_query($con,$sql);
		if(mysqli_num_rows($res) > 0)
		{
				$auth=1;
		}
		else
		{
			echo"<script>alert('Incorrect Password or Username')</script>";
		}
	
		if( $auth==1)
		{
			$psw = clean_data($_POST["npsw"]);
			if (!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}$/",$psw))
			{
				$valid=0;
				echo"<script>alert('Invalid Password Must contain  atleast one number and  one uppercase and lowercase letter  and at least 5 or more characters')</script>";
			}
			if($valid==1)
			{
					$cpsw = clean_data($_POST["cnpsw"]);
					if(!($psw==$cpsw))
					{
						$pmat=1;
						echo"<script>alert('Confirm Password Did not Match')</script>";
					}
					if($pmat==0)
					{
								$psw=md5($psw);
								$sql="update admin set Password='$psw' where UserName='$username'";
								mysqli_query($con,$sql);
								echo"<script>alert('Password updated Succesfully')</script>";
					}
			}
			
		}
		
	
	
	
	
	
	
	}
}
?>
<div class="topheader">
<ul>
<li class="projectname">BloodBank Management System</li>
<li class="inline"><a class="links" href="admin.php" target="_blank">Admin</a></li>
<li class="inline"><a class="links" href="http://localhost/project/about.php">About</a></li>
<li class="inline"><a class="links" href="http://localhost/project/whybecomeadonor.php">Why Become Donor</a></li>
<li class="inline"><a class="links" href="http://localhost/project/becomeadonor.html" >Become a Donor</a></li>
<li class="inline"><a class="links" href="http://localhost/project/searchblood.html">Search Blood</a></li>
<li class="inline"><a class="links" href="http://localhost/project/contactus.php">Contact Us</a></li>
<li class="inline"><a class="links" href="admin.php">Logout</a></li>
</ul>
</div>
<div class="leftmenu">
<a href="adminentered.php" class="header">Main Menu</a>
<ul>
  <li><a href="changepassword.php">Change Password</a></li>
  <li><a href="adddonor.php">Add Donor</a></li>
  <li><a href="donorlist.php">Donor List</a></li>
  <li><a href="contactusqueries.php">Contact Us query</a></li>
  <li><a href="donorpage.php">Manage Why Become<br>Donor Page</a></li>
  <li><a href="aboutpage.php">Manage About Page</a></li>
</ul>
</div>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="leftmargin">
<table class="card">
<tr>
	<th class="cardhead">Change Password</th>
</tr>
<tr>

	<td class="tdata" >UserName<input class="pswinput" type="text" name="username" id="username"><span class="red">*</span></td>

</tr>
<tr>

	<td class="tdata" >Current Password<input class="pswinput" type="Password" name="curpsw" id="curpsw"><span class="red">*</span></td>

</tr>
<tr>

	<td class="tdata" >New Password<input class="pswinput" type="Password" name="npsw" id="npsw"><span class="red">*</span></td>

</tr>
<tr>

	<td class="tdata" >Confirm New Password<input class="pswinput" type="Password" name="cnpsw" id="cnpsw"><span class="red">*</span></td>

</tr>
<tr>
	<td class="changepbutton"><button  class="loginbutton" type="submit" name="updatepsw" >UPDATE</button><td>
</tr>
</table>
</div>
</form>


</body>
</html>