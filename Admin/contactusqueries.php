<!DOCTYPE html>
<html>
<head>
<title>Blood Bank Management System</title>
<style>
body, html {
  height: 100%;
  margin: 0;
  background-image: url("querie.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
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
table,td{
	border:1px solid black;
	border-collapse:collapse;
	background-color:white;
	height:30px;
}
th{
	border:1px solid black;
	border-radius:2px;
	border-collapse:collapse;
	background-color:grey;
}
.mytextbox{
    width: 300px;
	height:30px;
	border-radius:4px;
	border:1px solid #989898;
}
.delqueryhead{
border:1px solid white;
border-radius:8px;
background-color:#F0F0F0;
width:800px;
padding-top:10px;
padding-left:10px;
padding-bottom:10px;
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
<form method="POST">

<div class='delqueryhead'>Enter Id of the query to delete</div><br>
<input class='mytextbox' type='number' name='queryid'><br>
<br><input class='delbutton' type='submit' name='delquery' value='Delete query'><br><br>

</form>
<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"dbms");

$query = mysqli_query($con,"select * from querycontactus");
echo "<table>
<tr>
<th>Id</th>
<th>Name</th>
<th>EmailId</th>
<th>Contact Number</th>
<th>Message</th>
<th>PostingDate</th>
<th>Status</th>
</tr>";

while($value=mysqli_fetch_array($query))

{
 
echo
"<tr>
<td>".$value['id']."</td>";
echo "<td>".$value['name']."</td>";
echo "<td>".$value['EmailId']."</td>";
echo "<td>".$value['ContactNumber']."</td>";
echo "<td>".$value['Message']."</td>";
echo "<td>".$value['PostingDate']."</td>";
echo "<td>".$value['status']."</td>";
echo "</tr>";
}


?>

<?php
	if(isset($_POST["delquery"]))
	{
		validatesession();
		if(!empty($_POST["queryid"]))
		{
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$con=mysqli_connect($host, $user, $pass);
			$queryid=$_POST["queryid"];
			mysqli_select_db($con,'dbms');
			$sql = "DELETE from querycontactus where (id='$queryid')";
			mysqli_query($con,$sql);
			echo"<script>
			var r=confirm('Query Deleted Successfully');
			if (r == true) {
				window.location.href = 'contactusqueries.php';
				}
			  </script>";
		}
		else{
			echo"<script>alert('Please enter the query id to delete')</script>";
		}
	}
?>
</div>
</body>
</html>