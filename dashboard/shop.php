<!-- Ads -->
<?php
include("../connectdb.php"); 
session_start();
$uid=$_SESSION['nID'];
$q1 = "SELECT `bname`      
         FROM `book_ad`  
         WHERE `uid`='$uid'";
         $records=mysql_query($q1);
         
?>

<html>
<head>
	<title>Your Notifications</title>

	<link rel="stylesheet" type="text/css" href="../css/dashboard.css" />
	<link rel="stylesheet" type="text/css" href="../css/fonts.css" />

	<script type="text/javascript" src="../js/jquery-1.11.1.min.js" ></script>
	<script type="text/javascript" src="../js/main.js" ></script>

</head>

<body>
	<div id="notificationBox">
		<h1>Booksiders Store</h1>

		<ul class="shop">
			<li>Sorry! You have 0 bookstores. Sad. :(</li>
			<li><button class="openShop">Open store now</button></li>
		</ul>
	</div>
</body>
</html>