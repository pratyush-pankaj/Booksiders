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
			$category=$_POST["cat1"];
			$category2=$_POST["cat2"];
			$category3=$_POST["cat3"];
			$category4=$_POST["cat4"];
			$landmark=$_POST["landmark"];
		
			$description=$_POST["discription"];
			
			$rating=$_POST["rating"];
			$review=$_POST["review"];
			$name=$_POST["nameSeller"];
			$author=$_POST["author"];
			$uid=$_SESSION['nID'];
		      $dir="Book-pics/$uid/";
		    $check = $_POST["checkImageUpload"];  
				
				//folowing are the quality checking variables which are initialy zero
				function ad_quality_algo()
				{    
				$qprice=$qbname=$qphone=$qcity=$qisbn=$qpublication=$qedition=$qoriginalPrice=$qcategory=$qcategory2=$qcategory3=$qcategory4=$qlandmark=$qdescription=$qrating=$qreview=$qname=$qauthor=$qtarget_Path=0;
				
				$bname=$_POST["nameBook"];
				$price=$_POST["price"];
				$phone=$_POST["phone"];
					$city=$_POST["city"];
				$isbn=$_POST["isbn"];
					$publication=$_POST["publication"];
				$edition=$_POST["edition"];
				$originalPrice=$_POST["originalPrice"];
				$category=$_POST["cat1"];
				$category2=$_POST["cat2"];
				$category3=$_POST["cat3"];
				$category4=$_POST["cat4"];
				$landmark=$_POST["landmark"];
				$rating=$_POST["rating"];
			$review=$_POST["review"];
			$name=$_POST["nameSeller"];
			$author=$_POST["author"];
			 $check = $_POST["checkImageUpload"];  
			 if($_FILES["imageBook"]["error"] != 0) 
	    {
		    if(!file_exists($dir))
		    {
			mkdir("Book-pics/$uid");
		   }
		   $target_Path="Book-pics/$uid/";
		  $target_Path=$target_Path.basename( $_FILES['imageBook']['name'] );
		  move_uploaded_file( $_FILES['imageBook']['tmp_name'], $target_Path);
	         
	     }

	     else
	     {
	     	$target_Path = $_POST["imageBook"];
	     }
					if (!empty($bname))
					$qbname=2;
					if (!empty($price))
					$qprice=4;
					
					if (!empty($phone))
					$qphone=4;
					
					if (!empty($city))
					$qcity=5;
					
					if (!empty($isbn))
					{
					  $qisbn=10;
					}
					if (!empty($publication))
					{$qpublication=6;
					}
					if (!empty($edition))
					{ $qedition=6;
					
					
					}
					if (!empty($originalPrice))
					{  $qoriginalPrice=6;
					
					
					}
					
					if (!empty($category))
					
					{
					  $qcategory=2;
					
					}
					if (!empty($category2))
					{ $qcategory2=2;
					
					
					}
					
					if (!empty($category3))
					{   $qcategory3=2;
					
					
					}
					
					if (!empty($category4))
					{ $qcategory4=2;
					
					
					}
					if (!empty($landmark))
					{  $qlandmark=6;
					
					
					}
					
					if (!empty($rating))
					{ $qrating=8;
					
					
					}
					$description=$_POST["discription"];
					if(strcmp($description,"unrated")==0)$qdescription=0;
					elseif(strcmp($description,"Good Condition")==0)$qdescription=6;
					elseif(strcmp($description,"Fair")==0)$qdescription=5;
					elseif(strcmp($description,"Readable")==0)$qdescription=3;
					elseif(strcmp($description,"Slightly Torn")==0)$qdescription=4;
					elseif(strcmp($description,"ok..ok..take this at very less price")==0)$qdescription=2;
					
					
					
					if (!empty($review)&&strlen($review)>120)
				    {
					 $qreview=10;
					
					}
					elseif(!empty($review)&&strlen($review)<10)
					{
						$qreview=1;
					}
					
					elseif(!empty($review)&&strlen($review)>=10&&strlen($review)<=120)
					{
						$qreview=5;
					}
					
					if (!empty($name))
					{
					 $qname=1;
					
					}
					
					if (!empty($author))
					{ $qauthor=8;
					
					
					}
					
					if (!empty($target_Path))
					{
					
					 $qtarget_Path=10;
					}
					$total=$qprice+$qbname+$qphone+$qcity+$qisbn+$qpublication+$qedition+$qoriginalPrice+$qcategory+$qcategory2+$qcategory3+$qcategory4+$qlandmark+$qdescription+$qrating+$qreview+$qname+$qauthor+$qtarget_Path;
					return $total;
				}
				
				$ad_quality=ad_quality_algo();
			
	    if( $check==0 )
	    {
		    if(!file_exists($dir))
		    {
			mkdir("Book-pics/$uid");
		   }
		   $target_Path="Book-pics/$uid/";
		  $target_Path=$target_Path.basename( $_FILES['imageBook']['name'] );
		  move_uploaded_file( $_FILES['imageBook']['tmp_name'], $target_Path);
	         
	     }

	     else
	     {
	     	$target_Path = $_POST["imageBook"];
	     }
            include("connectdb.php");
  	 $q1="insert into book_ad(uid,bname,img,price,name,phone,city,isbn,author,publication,edition,org_price,category,category2,category3,category4,landmark,description,rating,review,ad_quality) values('".$uid."','".mysql_real_escape_string($bname)."','".mysql_real_escape_string($target_Path)."','".$price."','".$name."','".$phone."','".$city."','".$isbn."','".$author."','".$publication."','".$edition."','".$originalPrice."','".$category."','".$category2."','".$category3."','".$category4."','".mysql_real_escape_string($landmark)."','".$description."','".$rating."','".mysql_real_escape_string($review)."','".$ad_quality."')";
                      if(mysql_query($q1,$con))
			{                
						$ad_id=mysql_insert_id($con);;
						// session_start();
						// $_SESSION['adID'] = $session_id;

			                $q2="insert into inside_book_details(uid,book,name,isbn,edition,rating,review,category,category2,category3,category4) values('".$uid."','".mysql_real_escape_string($bname)."','".$name."','".$isbn."','".$edition."','".$rating."','".mysql_real_escape_string($review)."','".$category."','".$category2."','".$category3."','".$category4."')";
				           if (!empty($rating))
				           { 
							     mysql_query($q2,$con);
								
							}	
							?>
							<script type="text/javascript">
							window.location = "adPage.php?ad_id=<?php echo $ad_id; ?>"
							</script>
							<?php
							// header("Location: adPage.php?ad_id=".$ad_id);
				
        //                     else
        //                     	{echo mysql_error(); 
								// 	echo "not inserted in inside_book_details"; 
								// }
                            
                            ?> 
                           <script>
						   //          alert("your book details have been inserted Ad Quality <?php echo $ad_quality;?> %");
									// window.location= "index.php";
						           
						   </script>
<?php
                                                                                           
			}
				
		// 	else {																			
		// 		echo "<h1>property not inserted<h1>";																			
			    
		// 	echo $bname.' '.$price.' '.$phone.' '.$city.' '.$isbn.' '.$publication.' '.$edition.' '.$originalPrice.' '.$category.' '.$landmark.' '.$description.' '.$rating.' '.$review.' '.$name.' '.$author.' '.$uid." ".$target_Path ;
		// echo mysql_error();}
 
 ?>
