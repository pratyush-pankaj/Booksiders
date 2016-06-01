<?php

include("connectdb.php");
session_start();
if(isset($_SESSION['nID'])&&!empty($_SESSION['nID']))
{
 $uid=$_SESSION['nID'];
			$phone=$_POST["phone"];
            $landmark=$_POST["landmark"];

			
			
			


						  $dir="Book-pics/$uid/";
	    if(!file_exists($dir))
	    {
		mkdir("Book-pics/$uid");
	   }
	   if(empty($_FILES['imageBook']['name']))
	   {
	   	$taget_Path = "";
	   }
	   else
	   {
	   $target_Path="Book-pics/$uid/";
	  $target_Path=$target_Path.basename( $_FILES['imageBook']['name'] );
	  move_uploaded_file( $_FILES['imageBook']['tmp_name'], $target_Path);
	}
         
            
			$q1="UPDATE `registered_users`
			SET `phone_no`='$phone', `location`='$landmark', `profile_pic`='$target_Path'
			WHERE `uid`= '$uid' ";
                        if(mysql_query($q1,$con))
			{                
			                
							
                            
                            ?> 
                           <script>
						           
									window.location= "dashboard.php";
						           
						   </script>
<?php
                                                                                           
			}
				
		else {																			
				
		echo mysql_error();
		}
		
 
 }
 else
 {
  ?> 
                           <script>
						           
									window.location= "index.php";
						           
						   </script>
<?php
                                   
 
 }
?>