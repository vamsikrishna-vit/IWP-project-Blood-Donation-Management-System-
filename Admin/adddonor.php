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
.tbecomedonor{
border:1px solid white;
width:1300px;
padding-bottom:10px;
margin-top:0;
font-size:25px;

}
.becomedonorhead{
border:1px solid white;
border-radius:8px;
text-align:left;
background-color:#F0F0F0;
width:1000px;
padding-top:10px;
padding-bottom:10px;
padding-left:10px;
font-size:20px;
}
.red{
color:red;
}
.mytextbox{
    width: 300px;
	height:30px;
	border-radius:4px;
	border:1px solid #989898;
}
.submitbutton{
border:1px solid white;
border-radius:5px;
width:120px;
height:50px;
background-color:#0066FF;
color:white;
font-size:20px;
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

<div class="leftmargin">

<center><span style="font-size:40px;"><b>Add a Donor</b></span></center>
<center>
<form method="POST" action="senddata.php" onsubmit="return checkbecomedonor();">
<table class="tbecomedonor">
<tr>
	<th colspan="3" class="becomedonorhead">Home/Become Donor</th>
</tr>
<tr>
	<td>Full name<span class="red">*</span><br>
		<input class="mytextbox" type="text" name="fullnameofdonor" id="fullname">
	</td>
	<td>Mobile number<span class="red">*</span><br>
		<input class="mytextbox" type="tel" name="mobileno" id="mobilenumber">
	</td>
	<td>Email-id<br>
		<input class="mytextbox" type="email" name="email" id="email">
	</td>
</tr>
<tr>
	<td><br>age<span class="red">*</span><br><input class="mytextbox" type="number" name="age" id="age"></td>
	<td><br>Gender<span class="red">*</span><br><select class="mytextbox" name="gender">
												<option value="male">Male</option>
												<option value="female">Female</option>
												<option value="other">Other</option>
										</select>
	
	</td>
	<td><br>Blood Group<span class="red">*</span><br>
											<select class="mytextbox" name="bloodgrp">
												<option value="AB+">AB+</option>
												<option value="AB-">AB-</option>
												<option value="A+">A+</option>
												<option value="A-">A-</option>
												<option value="B+">B+</option>
												<option value="B-">B-</option>
												<option value="O+">O+</option>
												<option value="O-">O-</option>
											</select><br>
	</td>
</tr>
<tr>
	<td><br>Address<span class="red">*</span><br>
		<textarea name="address" id="dadrs" rows="4" cols="39">
		</textarea>
	
	</td>
	<td colspan="2"><br>Message<br>
		<textarea name="message" rows="4" cols="80">
		</textarea>
	</td>
</tr>
</table>

<span style="margin-left:110px"><button type="submit" name="submit_form" class="submitbutton" >Submit</button></span><br>

</form>
</center>
</div>
<script>
function checkbecomedonor(){
var dfullname=document.getElementById("fullname").value;
var dmobileno=document.getElementById("mobilenumber").value;
var dage=document.getElementById("age").value;
var daddress=document.getElementById("dadrs").value;
m="";
t=1;
var ldname=dfullname.length;
var ladrs=daddress.length;
if(ldname<5)
{
m=m+"Full Name Must Be atleast five characters\n";
t=0;
}
number=/^\d{10}$/;
var result=number.test(dmobileno);
if(!result)
{
m=m+"The Number you entered is invalid.It should be 10digits(all numbers only)\n";
t=0;
}
if(dage<18)
{
m=m+"\nAge should be more than or equal to 18";
t=0;
}
if(dage>65)
{
m=m+"\nAge should be less than 65";
t=0;
}
if(ladrs<1)
{
m=m+"\nAddress Must be filled out";
t=0;
}
if(t==0){
alert(m);
return false;
}
if(t==1){

}
}
</script>


</body>
</html>