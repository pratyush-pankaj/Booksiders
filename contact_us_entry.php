<html>
<head>
</head>
<body>
<?php
         
          $name=$_POST["name"];
          $email=$_POST["email"];
          $message=$_POST["messageText"];
		  $phone=$_POST["phone"];
         
            include("connectdb.php");
	 $q1="insert into contact_us(name,email,message,phone) values('".$name."','".$email."','".$message."','".$phone."')";
                        if(mysql_query($q1,$con))
			{
			?>
			    <script>
				alert("your message has been sent to the admin....you will get your reply soon via email");
               </script>
			  <?php                                                                              
			  }
			else
			{
				?>
				<script>
				alert("wrong karma please try again");
				</script>
				<?php
			}

                ?>
</body>
</html>