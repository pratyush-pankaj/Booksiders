<?php
session_start();
unset($_SESSION['nID']);
if (!isset($_SESSION['nID']))
{ 
 				session_destroy();
				header("Location: index.php?status=logout");	  
					  ?>
				
				 

	                  <?php 
					   
}

?>
