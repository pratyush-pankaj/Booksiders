<html>
<head>
</head>
<body>
<?php
         
		    
            session_start();
			
			$bname=$_POST["nameBook"];
            $price=$_POST["price"];
            $phone=$_POST["phone"];
			$city=$_POST["city"];
			$isbn=$_POST["isbn"];
			$publication=$_POST["publication"];
			$edition=$_POST["edition"];
			$originalPrice=$_POST["originalPrice"];
			$category=$_POST["category"];
			$category2=$_POST["category"];
			$category3=$_POST["category"];
			$category4=$_POST["category"];
			$landmark=$_POST["landmark"];
			$landmark2=$_POST["landmark"];
			$landmark3=$_POST["landmark"];
			$landmark4=$_POST["landmark"];
			$description=$_POST["discription"];
			$rating=$_POST["rating"];
			$review=$_POST["review"];
			$name=$_POST["nameSeller"];
			$author=$_POST["author"];
			$ad_id=$_POST["ad_id"];
			$uid=$_SESSION['nID'];
		      $dir="Book-pics/$uid/";
	    if(!file_exists($dir))
	    {
		mkdir("Book-pics/$uid");
	   }
	   $target_Path="Book-pics/$uid/";
	  $target_Path=$target_Path.basename( $_FILES['imageBook']['name'] );
	  move_uploaded_file( $_FILES['imageBook']['tmp_name'], $target_Path);
         
            include("connectdb.php");
			$q1 = "UPDATE book_ad SET bname='$bname', price='$price',phone='$phone', city='$city',isbn='$isbn', publication='$publication',edition='$edition', org_price='$originalPrice',category='$category', category2='$category2',category3='$category3', category4='$category4',landmark='$landmark', landmark2='$landmark2',landmark3='$landmark3', landmark4='$landmark4',description='$description', rating='$rating',review='$review', name='$name',author='$author', uid='$uid',img='$target_Path' WHERE ad_id='$ad_id' ";
	
                        if(mysql_query($q1,$con))
			{                
			                
							
                            
                            ?> 
                           <script>
						            alert("your book details have been updated");
									window.location= "index.php";
						           
						   </script>
<?php
                                                                                           
			}
				
			else {																			
				echo "<h1>details not updated<h1>";																			
			    
			echo $bname.' '.$price.' '.$phone.' '.$city.' '.$isbn.' '.$publication.' '.$edition.' '.$originalPrice.' '.$category.' '.$landmark.' '.$description.' '.$rating.' '.$review.' '.$name.' '.$author.' '.$uid." ".$target_Path ;
		echo mysql_error();}
 
 ?>
</body>
</html>