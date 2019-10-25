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
.pagehead{
border:1px solid white;
border-radius:8px;
text-align:left;
background-color:#F0F0F0;
width:1200px;
padding-top:10px;
padding-bottom:10px;
padding-left:10px;
font-size:20px;
}
.textbox{
	margin-top:2px;
	border-radius:7px;
	border-color:black;
	font-size:20px;
	padding:23px;
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
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 3000))
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
if(isset($_POST["updateabout"]))
{
	validatesession();
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$con=mysqli_connect($host, $user, $pass);
	mysqli_select_db($con,'dbms');
	$pagename="About Us";
	$details=$_POST["updateaboutpage"];
	$sql="update pages set detail='$details' where PageName='$pagename'";
	mysqli_query($con,$sql);
	header("Location:aboutpage.php");
}
if(isset($_POST["canceld"]))
{
	validatesession();
	header("Location:adminentered.php");
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

<form method="POST">
<div class="leftmargin">
<center>
<div class="pagehead">Update About Page</div>
</center>
<center>
<textarea class="textbox" rows="13" cols="102" name="updateaboutpage">
<?php
validatesession();
	$pname='About Us';
	$sql = "SELECT * from pages where (PageName='$pname')";
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$con=mysqli_connect($host, $user, $pass);
	mysqli_select_db($con,'dbms');
	$res = mysqli_query($con,$sql);
	while($value=mysqli_fetch_array($res))
	{
			echo $value['detail'];
			mysqli_close($con);
		
	}
?>
</textarea>
<br><br>
<button  class="loginbutton" type="submit" name="updateabout" >UPDATE</button>
<button  class="loginbutton" type="submit" name="canceld" >Cancel</button><br>
</center>
</div>
</form>
</body>
</html>