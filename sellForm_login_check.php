<?php 


        if(session_status()!=PHP_SESSION_ACTIVE) {session_start();}
		    @ob_start();
  
include("connectdb.php"); 


if(!isset($_SESSION['nID'])&&empty($_SESSION['nID']))
{   
    include('signUp.php');
      echo "<center>Please Login First :)<center>";
}

	else
	{
		 ?>
		 <script type="text/javascript">
		 	window.location = "sellForm";
		 </script>
		 <?php
		
	
	}
     

 

?>