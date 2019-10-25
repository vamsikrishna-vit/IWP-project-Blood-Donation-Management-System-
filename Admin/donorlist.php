<!DOCTYPE html>
<html>
<head>
<title>Blood Bank Management System</title>
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
body, html {
  height: 100%;
  margin: 0;
   background-image: url("blooddonors.png");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.firstheading{
	color:green;
	font-size:75px;
}
.secondheading{
	color:blue;
	font-size:75px;
}
table,td{
	border:1px solid black;
	border-collapse:collapse;
	background-color:white;
	height:30px;
}
th{
	border:1px solid black;
	border-collapse:collapse;
	background-color:grey;
	height:30px;
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
.delbutton{
border:1px solid white;
border-radius:5px;
width:170px;
height:50px;
background-color:#0066FF;
color:white;
font-size:20px;
}
.searchbloodhead{
border:1px solid white;
border-radius:8px;
background-color:#F0F0F0;
width:800px;
padding-top:10px;
padding-left:10px;
padding-bottom:10px;
font-size:20px;
}
.deldonorhead{
border:1px solid white;
border-radius:8px;
background-color:#F0F0F0;
width:800px;
padding-top:10px;
padding-left:10px;
padding-bottom:10px;
font-size:20px;
}
.mytextbox{
    width: 300px;
	height:30px;
	border-radius:4px;
	border:1px solid #989898;
}
.del{
	position:relative;
	float:bottom;
}
.restable{
padding-bottom:50px;
}	
</style>
<body class="indeximg">
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
<form  method="post" >
<span  style="font-size:60px;"><b>Search Donor</b></span><br><br>
<div class="searchbloodhead">Search blood</div><br><span style="font-size:20px;">Blood Group</span><span class="red">*</span><br>
<select class="mytextbox" name="sbloodgrp" id="sbloodgrp">
		<option value="AB+">AB+</option>
		<option value="AB-">AB-</option>
		<option value="A+">A+</option>
		<option value="A-">A-</option>
		<option value="B+">B+</option>
		<option value="B-">B-</option>
		<option value="O+">O+</option>
	    <option value="O-">O-</option>
		</select><br><br>
<button type="submit" class="submitbutton" name="search_blood">Submit</button>
</form>
<form method="POST">
<div class='deldonorhead'>Enter Id of the person to delete</div><br>
<input class='mytextbox' type='number' name='donorid'><br>
<br><input class='delbutton' type='submit' name='deldonor' value='Delete Donor'><br><br>
</form>
<?php
if (isset($_POST["search_blood"])) {
	validatesession();
	$status=1;
	$bloodgroup=$_POST['sbloodgrp'];
	$sql = "SELECT * from blooddonorsinfo where (status='$status' and BloodGroup='$bloodgroup')";
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$con=mysqli_connect($host, $user, $pass);
	mysqli_select_db($con,'dbms');
	$query = mysqli_query($con,$sql);
	$numrows=mysqli_num_rows($query);
	echo"<div class='restable'>";
	echo "<table>
	<tr>
	<th>Id</th>
	<th>Full Name</th>
	<th>Mobile Number</th>
	<th>Email-Id</th>
	<th>Gender</th>
	<th>Age</th>
	<th>Blood Group</th>
	<th>Address</th>
	<th>Message</th>
	<th>Posting Date</th>
	<th>status</th>
	</tr>";
	$sno=0;
	while($value=mysqli_fetch_array($query))
	{
	 
		$sno=$sno+1;
		echo
		"<tr>
		<td>".$value["id"]."</td>";
		echo "<td>".$value['FullName']."</td>";
		echo "<td>".$value['MobileNumber']."</td>";
		echo "<td>".$value['EmailId']."</td>";
		echo "<td>".$value['Gender']."</td>";
		echo "<td>".$value['Age']."</td>";
		echo "<td>".$value['BloodGroup']."</td>";
		echo "<td>".$value['Address']."</td>";
		echo "<td>".$value['Message']."</td>";
		echo "<td>".$value['PostingDate']."</td>";
		echo "<td>".$value['status']."</td>";
		echo "</tr>";

	}
	echo"</div>";

}
?>

<?php
	if(isset($_POST["deldonor"]))
	{
		validatesession();
		if(!empty($_POST["donorid"]))
		{
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$con=mysqli_connect($host, $user, $pass);
			$donorid=$_POST["donorid"];
			mysqli_select_db($con,'dbms');
			$sql = "DELETE from blooddonorsinfo where (id='$donorid')";
			mysqli_query($con,$sql);
			echo"<script>
			var r=confirm('Donor deleted successfully');
			if (r == true) {
				window.location.href = 'donorlist.php';
				}
			  </script>";
		}
		else{
			echo"<script>alert('Please enter the donor id to delete')</script>";
		}
	}
?>



<?php
if(isset($_POST["sessiont"]))
{
		validatesession();
		echo"Session is still alive";
}
?>
</div>
</body>
</html>