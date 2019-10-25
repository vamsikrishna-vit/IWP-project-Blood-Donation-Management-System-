<!DOCTYPE html>
<html>
<head>
<style>

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

</style>
</head>
<body>
<center><div class="firstheading"><b>Search Blood</b></div></center>
<center><div class="secondheading"><b>Here is the list of<br> Blood Donors</b></div></center>
<center>
<?php
if( isset( $_POST['search_blood'] ) )
{
	$status=1;
	$bloodgroup=$_POST['sbloodgrp'];
	$sql = "SELECT * from blooddonorsinfo where (status='$status' and BloodGroup='$bloodgroup')";
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$con=mysqli_connect($host, $user, $pass);
	mysqli_select_db($con,'dbms');
	$query = mysqli_query($con,$sql);
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
	$sno=1;
	while($value=mysqli_fetch_array($query))
	{
	 
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
}
?>
</center>
</body>
</html>