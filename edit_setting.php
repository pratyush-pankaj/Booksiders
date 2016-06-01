<html>
<head>
</head>
<body>
<?php
         
		    
            session_start();
			$uid=$_SESSION['nID'];
			$uname=$_POST["name"];
            $pwd=$_POST["password"];
         
            include("connectdb.php");
			$q1 = "UPDATE registered_users SET user_name='$uname',pwd='$pwd' WHERE uid='$uid' ";
	
                      if(mysql_query($q1,$con))
			{                
			                
							
                            
                            ?> 
                           <script>
						            alert("your profile have been updated");
									window.location= "index.php";
						           
						   </script>
<?php
                                                                                           
			}
				
			else {																			
				echo "<h1>profile not updated<h1>";																			
			    
		
		echo mysql_error();}
 
 ?>
</body>
</html>