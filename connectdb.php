<?php
$con = mysql_connect("localhost","bookside","navita.2508");

if(!mysql_select_db("bookside_books",$con))
	echo "Unable to connect to database";

$base_url='http://www.booksiders.com/';
?>