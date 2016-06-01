<?php include("connectdb.php"); 
$id=$_GET['ad_id'];
if(mysql_query("delete from book_ad where ad_id='$id'"))
{
  
                   ?> 
                           <script>
						            alert("your book ad has been deleted");
									window.location= "dashboard.php";
						           
						   </script>
<?php
                                                                                           
			}
			else
			{echo mysql_error();}
			?>
				