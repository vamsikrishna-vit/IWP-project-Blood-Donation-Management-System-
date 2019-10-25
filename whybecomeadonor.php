<!DOCTYPE html>
<html>
<head>
<title>Why Become a Donor</title>
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
</div><br><br>
<div style="padding-left:10px">
<p><h1 style="font-size:40px;">Why Become a Donor</h1><p>
<img src="donateblood.jpg" style="float:right;height:400px;">
<p style="font-size:25px;">
<?php
	$pname='Why Become Donor';
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

<b style="font-size:30px;">Surprising Health Benefits of Donating Blood</b>

<ul style="font-size:30px;">
	<li> Giving blood can reveal potential health problems </li>
	<li> Giving blood can reduce harmful iron stores </li>
	<li> Giving blood may lower your risk of suffering a heart attack </li>
	<li> Giving blood may reduce your risk of developing cancer </li>
	<li> Giving blood can help your liver stay healthy </li>
	<li> Giving blood can help your mental state </li>

</ul>
</div>
<div class="bottom">
<p style="color:#A9A9A9;">IWP Project by 17BCB0054,17BCE0502,17BCE0180</p></div>
</body>
</html>