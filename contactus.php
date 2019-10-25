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
.topmargin{
margin-top:60px;
}
.sendmessagebutton{
border:1px solid white;
border-radius:5px;
width:160px;
height:50px;
background-color:#0066FF;
color:white;
font-size:20px;
}
.red{
color:red;
}
.mymessagetextbox{
    width: 600px;
	height:30px;
	border-radius:4px;
	border:1px solid #989898;
}
.contacthead{
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
$cnameerr=$pherr=$emailerr=$msgerr="";
 function validate_data($data)
 {
  $data = trim($data);
  $data = stripslashes($data);
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
  return $data;    
 }
if( isset( $_POST['submit_form'] ) )
{

$er=0;
	if (empty($_POST["contactname"]))
		{
			$er=1;
		$cnameerr = "Name is required";
		}
	else
		{
		$contactname=validate_data($_POST['contactname']);
		if (!preg_match("/[a-zA-Z].{2,}$/",$contactname)) {
			$er=1;
			$cnameerr = "Only letters are allowed and length should be Atleast 4 characters";
			}
		}
	if (empty($_POST["contactphonenumber"]))
		{
			$er=1;
			$pherr = "Contact Number is required";
		}
	else
		{	
		$contactphn=validate_data($_POST['contactphonenumber']);
		if (!preg_match("/^[1-9][0-9]{9}$/",$contactphn)){
			$er=1;
			$pherr="Invalid Phonenumber";
			}
		}
	if (empty($_POST["contactemail"]))
		{
			$er=1;
		$emailerr = "Email is required";
		}
	else
		{	
		$contactemail=validate_data($_POST['contactemail']);
		if (!filter_var($contactemail, FILTER_VALIDATE_EMAIL)){
			$er=1;
			$emailerr="Invalid Email";
			}
		}
	if (empty($_POST["contactmessage"]))
		{
			$er=1;
		$msgerr = "Message is Required";
		}
	else
		{	
		$contactmessage=validate_data($_POST['contactmessage']);
		if (!preg_match("/[@a-zA-Z0-9 ].{4,}$/",$contactmessage)){
			$er=1;
			$msgerr="Message should be atleast 5 characters";
			}
		}

	if($er==0)
	{
		$host = 'localhost';
		$user = 'root';
		$pass = '';

		$con=mysqli_connect($host, $user, $pass);
		mysqli_select_db($con,'dbms');
		$status=1;
		$sql="INSERT INTO  querycontactus(name,EmailId,ContactNumber,Message,status) VALUES('$contactname','$contactemail','$contactphn','$contactmessage','$status')";
		mysqli_query($con,$sql);
		echo"<script>alert('Message has been sent Successfully')</script>";
		
		
	}


}


?>
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
</div>
<div class="topmargin">
<div style="margin-left:115px">
<span  style="font-size:50px;"><b>Contact</b></span><br>
<div class="contacthead">Home/ Contact</div><span style="font-size:30px;"><b>Send us a message</b></span><br>
<img src="contactus.png" style="float:right;height:400px;margin-top:20px;margin-right:100px;width:600px;" alt="Contactus Image">
<form method="POST">
<span style="font-size:20px;">Full Name:</span><br>
<input class="mymessagetextbox" type="text" name="contactname"><span class="red">*<br><?php echo $cnameerr ?></span><br>
<span style="font-size:20px;">Phone Number</span><br>
<input class="mymessagetextbox" type="tel" name="contactphonenumber"><span class="red">*<br><?php echo $pherr?></span><br>
<span style="font-size:20px;">Email</span><br>
<input class="mymessagetextbox" type="text" name="contactemail"><span class="red">*<br><?php echo $emailerr?></span><br>
<span style="font-size:20px;">Message</span><br>
<textarea rows="12" cols="80" name="contactmessage">
</textarea><span class="red">*<br><?php echo $msgerr?></span><br>
<button type="submit" class="sendmessagebutton" name="submit_form">Send Message</button>
</div>
</div>
</form>
<br>
<div class="bottom">
<p style="color:#A9A9A9;">IWP Project by 17BCB0054,17BCE0502,17BCE0180</p></div>
</body>
</html>