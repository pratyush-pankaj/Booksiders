<!-- Ads -->
<?php
include("../connectdb.php"); 
session_start();
$uid=$_SESSION['nID'];
$q1 = "SELECT *      
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
		<h1>Your Recent Ads</h1>

		<ul class="adList">
			<?php
			    while($bname=mysql_fetch_array($records)) 
			    {
			    	?> <a href='adPage.php?ad_id=<?php echo $bname['ad_id']; ?>'><li><?php echo $bname['bname'];?></a>
				<div class="editBox">
					<a href='updateAdForm.php?ad_id=<?php echo $bname['ad_id']; ?>'>Edit</a>
					<a href='delete_ad.php?ad_id=<?php echo $bname['ad_id']; ?>'>Delete</a>
				</div>
			</li>
			    <?php
			}

			    
			?>
			
		</ul>
	</div>
</body>
</html>