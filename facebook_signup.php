<?php 

	session_start();
	
	
	if(isset($_GET["name"]) && isset($_GET["email"]) && isset($_GET["fid"]))
	{
		$name = $_GET["name"];
		$email = $_GET["email"];
		$pwd = $_GET["fid"];	
		include("connectdb.php");
		$stat = 1;
		$count=mysql_query("SELECT uid FROM registered_users WHERE email='$email'",$con);

		if(mysql_num_rows($count) < 1)
		{
			$q1 = "insert into registered_users(user_name,email,pwd,status) values('".$name."','".$email."','".$pwd."','".$stat."')";
			if(mysql_query($q1,$con))
			{
				$session_id=mysql_insert_id($con);;
				$_SESSION['nID'] = $session_id;

				?> 
                <script>
					window.location = "profile.php";		
				</script>
				<?php
			}
		}

		else{
			$person = mysql_query("SELECT * FROM registered_users WHERE email='$email'",$con);
			if($row = mysql_fetch_array($person))
			{
				$session_id = $row["uid"];
				$_SESSION['nID'] = $session_id;

				?> 
                <script>
					window.location = "index.php";		
				</script>
				<?php

			}
		}

	}

?>