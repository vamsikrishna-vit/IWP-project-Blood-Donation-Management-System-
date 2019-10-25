<!DOCTYPE html>
<html>
<head>
<title>About BloodBank Management System</title>
<style>

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
</style>
<body>
<div class="topheader">
<ul>
<li class="projectname">BloodBank Management System</li>
<li class="inline"><a class="links" href="Admin/admin.php" target="_blank">Admin</a></li>
<li class="inline"><a class="links" href="About.php">About</a></li>
<li class="inline"><a class="links" href="whybecomeadonor.php">Why Become Donor</a></li>
<li class="inline"><a class="links" href="becomeadonor.html" >Become a Donor</a></li>
<li class="inline"><a class="links" href="searchblood.html">Search Blood</a></li>
<li class="inline"><a class="links" href="contactus.php">Contact Us</a></li>
</ul>
</div><br><br><br><br>
<span style="font-size:50px;"><b>About</b></span><br>
<img src="about.gif" style="float:right;height:400px;margin-top:20px;margin-right:100px;width:600px;" alt="About Us Image">
<p style="font-size:30px">
<?php

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
		
	}

?>



</p>
<div class="bottom">
<p style="color:#A9A9A9;">IWP Project by 17BCB0054,17BCE0502,17BCE0180</p></div>
</body>
</html>