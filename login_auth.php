<?php      
            $email=$_POST["email"];
            $pwd=$_POST["password"];
         
            include("connectdb.php");

$q1 = "SELECT `uid`      
         FROM `registered_users`  
         WHERE `email`='$email'
         AND `pwd`='$pwd'";
	 $result =mysql_query ($q1) or die(mysql_error());

	   if (mysql_num_rows($result)!=0)
	{
		$uid=mysql_result($result,0,'uid');
           $session_id=$uid;
		session_start();
		$_SESSION['nID'] = $session_id;
		//setcookie("uid", $_SESSION['nID'], 1000);
		
		header("Location: index.php");
	}
	
	
	
	else
	{
	

		 
					   
					  ?>
				
				 <script>
						window.location= "signIn.php?status=wrong";
				 </script>

	                  <?php 
						
					
	 }
	
     
?>         