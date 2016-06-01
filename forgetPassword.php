<?php
	
	if(isset($_GET["email"]))
	{
		include("connectdb.php");
		$password = "";
		$email = $_GET["email"];
		$count=mysql_query("SELECT * FROM registered_users WHERE email='$email'",$con); 
		if(mysql_num_rows($count) > 0)
		{
			if($row = mysql_fetch_array($count))
			{
				$password = $row["pwd"];
				include 'smtp/Send_Mail.php';
				$to = $email;
				$subject = "Forget Password";

				$body = 'Hi '.$row['user_name'].',<br /><br />You Requested for your password. We have provided you with your password below.<br /><br />Password: '.$password.'<br /><br /><a href="http://www.booksiders.com/signIn.php">Click here to goto Sign In Page.</a><br /><br />Thank You';

				Send_Mail($to,$subject,$body);
				?> 
                <script>
					window.location = "signIn.php?status=password";		
				</script>
				<?php
			}
		}
		else{
			?> 
            <script>
				window.location = "signIn.php?status=email";		
			</script>				
			<?php
		}	

	}

?>
