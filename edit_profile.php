<html>
<head>
</head>
<body>
<?php
         
		    
            session_start();
			
			
			$uid=$_SESSION['nID'];
		      $phone_no=$_POST["no"];
			  $landmark=$_POST["landmark"];
			  $dir="Book-pics/$uid/";
	    if(!empty($_FILES['imageBook']['name']))
{
		if(!file_exists($dir))
	    {
		mkdir("Book-pics/$uid");
	   }
	   $target_Path="Book-pics/$uid/";
	  $target_Path=$target_Path.basename( $_FILES['imageBook']['name'] );
	  move_uploaded_file( $_FILES['imageBook']['tmp_name'], $target_Path);
         
 }     
	else{$target_Path="";}
 
 
		include("connectdb.php");
			$q1 = "UPDATE registered_users SET phone_no='$phone_no',profile_pic='$target_Path',location='$landmark' WHERE uid='$uid' ";
	
                        if(mysql_query($q1,$con))
			{                
			                
							
                            
                            ?> 
                           <script>
						        
									window.location= "dashboard.php";
						           
						   </script>
<?php
                                                                                           
			}
				
			else {																			
				
		echo mysql_error();}
 
 ?>
</body>
</html>