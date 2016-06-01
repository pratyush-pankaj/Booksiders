<html>
<head>
</head>
<body>

                          
							
<?php
			  
			
		 if (isset($_POST["name"])&&isset($_POST["email"])&&isset($_POST["password"]))
           { $name=$_POST["name"];
            
			$email=$_POST["email"];
            $pwd=$_POST["password"];
			
			
			
                           
							
			}
			
		else
		
									  
        
{		
            include("connectdb.php");
	 $q1="insert into registered_users(user_name,email,pwd) values('".$name."','".$email."','".$pwd."')";
                        
						if(mysql_query($q1,$con))
			{
				
                          
							
                            ?> 
                            <script>alert("welcome <?php echo $name; ?>");
							window.location= "index.php";
							</script>
							
<?php
                                                                                            }
			else
			{
				echo("login  failed.please retry");
			}
		
                                                                                                   }
																								   }
			
			
																								   
 ?>
</body>
</html>