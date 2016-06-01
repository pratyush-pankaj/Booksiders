<!-- Ads -->
<?php
include("../connectdb.php"); 
session_start();
$uid=$_SESSION['nID'];
$q1 = "SELECT *      
         FROM `registered_users`  
         WHERE `uid`='$uid'";
         $records=mysql_query($q1);
         $row=mysql_fetch_array($records)
?>

<html>
<head>
	<title>Your Notifications</title>

	<link rel="stylesheet" type="text/css" href="../css/dashboard.css" />
	<link rel="stylesheet" type="text/css" href="../css/fonts.css" />

	<script type="text/javascript" src="js/jquery-1.11.1.min.js" ></script>
	<script type="text/javascript" src="js/main.js" ></script>

</head>
<script type="text/javascript">
function validateForm()
{ 
	var pass1=document.forms["editInfo"]["password"].value;
	var pass2=document.forms["editInfo"]["repassword"].value;
	if(pass1 == pass2)
	{
		return true;
	}
	else
	{
		alert("passward dint match");
		return false;
	}
}
	
</script>
<body>
	<div id="notificationBox">
		<h1>Settings</h1> 
		<form id="editInfo" name="editInfo" action="edit_setting.php" method="POST" enctype="multipart/form-data" onSubmit="return validateForm();" >
			<ul class="settingList">
				<li>
					<p>Name </p>
					<input type="text" name="name" value="<?php echo $row['user_name'];?>" />
				</li>
				<li>
					<p>Email </p>
					<input type="text" value="<?php echo $row['email'];?>" readonly />
				</li>
				<li>
					<p>Password </p>
					<input type="password" name="password" value="<?php echo $row['pwd'];?>" />
				</li>
				<li>
					<p>Re Password </p>
					<input type="password" name="repassword" id="abc" value="<?php echo $row['pwd'];?>" />
				</li>
				<li class="passField"><p></p></li>
				<input type="submit" class="makeChangeButton" value="Make Change" />
			</ul>
		</form>
	</div>
</body>
</html>