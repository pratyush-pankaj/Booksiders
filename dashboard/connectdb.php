<?php
$con = mysql_connect("localhost","root","");

if(!mysql_select_db("books",$con))
	echo "Unable to connect to database";

?>