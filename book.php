<?php include("connectdb.php"); 
session_start();
$signin="<a href='signIn.php' class='opeSignInBox'><li>Sign In</li></a>";
$signup="<a href='signUp.php'><li class='opeSignUpBox'>SIGN UP</li></a>";
$uname['user_name']="";
$userName="My Account";
$logout="";
$editad="";
$deletead="";
if(isset($_SESSION['nID'])&&!empty($_SESSION['nID']))
{$signin="";
 $signup="";
 $uid=$_SESSION['nID'];

$q1 = "SELECT `user_name`      
         FROM `registered_users`  
         WHERE `uid`='$uid'";
         $records=mysql_query($q1);
         $uname=mysql_fetch_array($records);
    $userName=$uname['user_name'];     
	$logout="<a href='logout.php'><li>Log out</li></a>";
	$editad="<a href='dashboard.php'><li>Edit Ad</li></a>";
    $deletead="<a href='dashboard.php'><li>Delete Ad</li></a>";	
		 
}

$q2 = "SELECT DISTINCT * FROM `book_ad` order by `rating` desc LIMIT 3";
$bookByRating = mysql_query($q2);

if($bookByRating === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}

$isbn=$_GET['isbn'];
$bname=$_GET['name'];
// create url
$url="https://www.googleapis.com/books/v1/volumes?q=isbn:".$isbn."&key=AIzaSyCM-gRup6Lj0cgINCN9rfjvxCMHUmLTe5I&callback=handleResponse";

$book_api = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=isbn:".$isbn."&key=AIzaSyCM-gRup6Lj0cgINCN9rfjvxCMHUmLTe5I");

$book = json_decode($book_api);

$meta_data = $book->items;
if (count($meta_data)>0)
{
for($i = 0; $i < count($meta_data); $i++)
{
	
    $title = $meta_data[$i]->volumeInfo->title;
    $author = $meta_data[$i]->volumeInfo->authors[0];
    $desc = $meta_data[$i]->volumeInfo->description;
    $rating = $meta_data[$i]->volumeInfo->averageRating;
    $pages = $meta_data[$i]->volumeInfo->pageCount;
    $publication = $meta_data[$i]->volumeInfo->publisher;
    $thumb = $meta_data[$i]->volumeInfo->imageLinks->smallThumbnail;

    $rating = 2*$rating;
    $rating = (int) $rating;

    ?>

    <script type="text/javascript">
    	var rating = <?php echo $rating ?>;
    </script>	

    <?php

}
}
else
{

$q2 = "SELECT *      
         FROM `book_ad`  
         WHERE `bname`='$bname' LIMIT 1";
         $records=mysql_query($q2);
         if($uname=mysql_fetch_array($records))
       { $title = $uname['bname'];
          $author = $uname['author'];
          $desc = null;
          $rating = null;
          $pages = "NA";
          $publication = $uname['publication'];
          $thumb = $uname['img'];

         
          $rating = $uname['rating'];

      }
}

?>



<!doctype html>
<html lang="en">
	<head>
		<link rel="shortcut icon" href="booksidersLogo.png" />
		<title>BookSiders | Home</title>

		<!-- SEO GOES HERE. META AND ALL -->

		<meta charset="utf-8">
		<!-- SEO and Meta goes here -->

		<meta property="og:title" content="BOOKSIDERS" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="http://www.booksiders.com" />
		<meta property="og:image" content="http://www.booksiders.com/images/logo-full-black.png"/>
			    
		<meta name="description" content="BOOKSIDERS is a web application that provides a direct buyer to seller platform in buying and selling study material like books, magazines, journals etc.it allow the normal user to sell the study material at their own price rather than selling it to the book seller that act as the middle men and manipulate both buyer and seller in terms of price .BookSiders will remove the interference of the middle men booksellers. Also there is an ease of availability as it will be easy for the buyer if he/she gets its book from the person who lives near its own locality or studies in its own college so it will save its travelling time and money that would cost him in searching the desired book depot.User can also sell their self-prepared notes and post their add to earn money.In short BookSiders will convert your hard work directly into money.Provides a platform so much efficient and user-friendly  that your will get your buyer and seller at your own local area saves your time and travelling cost .o	It will increase availability and usage of books to such a great extent that everyone irrespective of class can easily access to books at a very less price hence it will allow free flow of information that will help to increase the level of education in India.Books are our real friends, the only one that enlightens our future.It’s a small initiative to allow free flow of knowledge and increase the level of education in India by sharing books and study material.Give importance to books, the importance that it really deserves.BOOKSIDERS is made by Pratyush Pankaj and Aman Jolly" />

		<meta name="keywords" content="booksiders,booksiders.com,sell your books,buy second hand books,buy used books,share book,lets sell and share,pratyush pankaj,aman jolly, best website made in india,new delhi,made in india,india's first website for buying and selling used books and study meterial,how to sell your study material,how to buy notes at very less price,bookside,booksider,olx of books,olx of study material,quicker of books,quicker of study material,olx of magazines,olx of journals,quicker of magazines,quicker of journals,best book deals,olx of novels,olx of study notes,quicker of novels,quicker of notes,kryptotech,website of kryptotech,product of kryptotech,Aman Jolly,Pratyush Pankaj,Search books by ISBN ,book name ,author ,category,Search books at your nearest locality/town/institute/landmark,how to Sell books and earn money,book review,gps of books,bookfinder,inside,get inside reviews of books,how to make your virtual bookstore,bookstore,Books are our real friends,the only one that enlightens our future.,world of books,get book reviews,how to get book reviews,zeus of books,king of books,friend of books,books kese beeche,buy cheap books." />
		<meta name="author" content="BOOKSIDERS" />

		<link rel="canonical" href="http://www.booksiders.com/" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="BOOKSIDERS" />
		<meta property="og:description" content="BOOKSIDERS is a web application that provides a direct buyer to seller platform in buying and selling study material like books, magazines, journals etc.it allow the normal user to sell the study material at their own price rather than selling it to the book seller that act as the middle men and manipulate both buyer and seller in terms of price .BookSiders will remove the interference of the middle men booksellers. Also there is an ease of availability as it will be easy for the buyer if he/she gets its book from the person who lives near its own locality or studies in its own college so it will save its travelling time and money that would cost him in searching the desired book depot.User can also sell their self-prepared notes and post their add to earn money.In short BookSiders will convert your hard work directly into money.Provides a platform so much efficient and user-friendly  that your will get your buyer and seller at your own local area saves your time and travelling cost .o	It will increase availability and usage of books to such a great extent that everyone irrespective of class can easily access to books at a very less price hence it will allow free flow of information that will help to increase the level of education in India.Books are our real friends, the only one that enlightens our future.It’s a small initiative to allow free flow of knowledge and increase the level of education in India by sharing books and study material.Give importance to books, the importance that it really deserves.BOOKSIDERS is made by Pratyush Pankaj and Aman Jolly" />

		<meta property="og:site_name" content="BOOKSIDERS" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Meta Ends -->
		
		<!-- SEO -->

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0" />

		<!-- [if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	
		<!-- CSS LINKED HERE -->
		<link rel="stylesheet" type="text/css" href="/css/book.css" />
		<link rel="stylesheet" type="text/css" href="/css/header.css" />
		<link rel="stylesheet" type="text/css" href="/css/fonts.css" />
		<link rel="stylesheet" type="text/css" href="/css/footer.css" />
		<link rel="stylesheet" type="text/css" href="/css/rating.css" />
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:500px)" href="/css/small_style.css" />
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:501px) and (max-width:800px)" href="/css/medium_style.css" />

		<!-- JAVASCRIPT LINKED HERE -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>	
	<script type="text/javascript" src="/js/jquery-1.11.1.min.js" ></script>
	<script type="text/javascript" src="/js/main.js" ></script>
	<script type="text/javascript" src="/js/rating-readonly.js"></script>



	<script type="text/javascript">

		$(function () {
                           
                $('#example-c').barrating('show', {
                    showValues:true,
                    showSelectedRating:false
                });

    	});

    </script>

		<!-- creating a global variable for cities -->
		<script type="text/javascript">
			var city="city";
			var selectedCity = '';
		</script>


		<style>
      #map-canvas {
        height: 0px;
        width: 0%;
        margin: 0;
      }
      .controls {
        margin-top: 16px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        /*box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);*/
      }

      #pac-input {
    position: relative;
	left: 50px;
	border: 1px #E5E4E2 solid;
	background: #ecf0f1;
	border-radius: 5px;
	width: 315px;
	margin: 10px auto;
	max-width: 80%;
	height: 40px;
	padding: 10px;
	padding-left: 10px;
	font-family: robotoLight;
	font-size: 14px;
	color: #444;
	transition: all 0.3s ease-in;
      }

      #pac-input:focus {
        border: 1px #A74AC7 solid !important;
	background: #A74AC7 !important;
	color: #fff !important;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #A74AC7;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

    </style>

<!-- Google Location JavaScript -->

<script type="text/javascript">

	function initialize() {
  var mapOptions = {
    center: new google.maps.LatLng(-33.8688, 151.2195),
    zoom: 13
  };
  var map = new google.maps.Map(document.getElementById('map-canvas'));

  var input = /** @type {HTMLInputElement} */(
      document.getElementById('pac-input'));

  var types = document.getElementById('type-selector');
  //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  var infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
    map: map,
    anchorPoint: new google.maps.Point(0, -29)
  });

  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    infowindow.close();
    marker.setVisible(false);
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      return;
    }

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);  // Why 17? Because it looks good.
    }
    marker.setIcon(/** @type {google.maps.Icon} */({
      url: place.icon,
      size: new google.maps.Size(71, 71),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(35, 35)
    }));
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);

    var address = '';
    if (place.address_components) {
      address = [
        (place.address_components[0] && place.address_components[0].short_name || ''),
        (place.address_components[1] && place.address_components[1].short_name || ''),
        (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    }

    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
    infowindow.open(map, marker);
  });

  // Sets a listener on a radio button to change the filter type on Places
  // Autocomplete.
  function setupClickListener(id, types) {
    var radioButton = document.getElementById(id);
    google.maps.event.addDomListener(radioButton, 'click', function() {
      autocomplete.setTypes(types);
    });
  }

  setupClickListener('changetype-all', []);
  setupClickListener('changetype-address', ['address']);
  setupClickListener('changetype-establishment', ['establishment']);
  setupClickListener('changetype-geocode', ['geocode']);
}

google.maps.event.addDomListener(window, 'load', initialize);
	

</script>


  <script type="text/javascript">var switchTo5x=true;</script>
  <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
  <script type="text/javascript">stLight.options({publisher: "af683db1-a63a-4ee1-a6cb-fabfe0130029", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
	
	</head>

	<body class="bookPhp">

		<!-- Extra Plugins -->

		<!-- Extra City Panel -->

		
		

		<div id="extraCity">
			<p>Select your City</p>

			<div id="cityNames">
            <ul>
            	<?php
            		$cityLine=mysql_query("SELECT * FROM city");
            		while($cityRow=mysql_fetch_array($cityLine))
            		{
            			$city[]=$cityRow['city'];
            			?>
            			<li><a href=''><?php echo $cityRow['city'] ?></a></li>
            			<?php
            		}
            	?>

            	<!-- Delete this section from putting online -->
                <!--<li><a href=''>Ahmedabad</a></li>
                <li><a href=''>Allahabad</a></li>
                <li><a href=''>Banglore</a></li>
                <li><a href=''>Bhopal</a></li>
                <li><a href=''>Bhubaneswar</a></li>
                <li><a href=''>Chandigarh</a></li>
                <li><a href=''>Chennai</a></li>
                <li><a href=''>Dehradun</a></li>
                <li><a href=''>Delhi NCR</a></li>
                <li><a href=''>Hydrabad</a></li>
                <li><a href=''>Indore</a></li>
                <li><a href=''>Jaipur</a></li>
                <li><a href=''>Kanpur</a></li>
                <li><a href=''>Kolkata</a></li>
                <li><a href=''>Kota</a></li>
                <li><a href=''>Lucknow</a></li>
                <li><a href=''>Mumbai</a></li>
                <li><a href=''>Nagpur</a></li>
                <li><a href=''>Patna</a></li>
                <li><a href=''>Pune</a></li>
                <li><a href=''>Raipur</a></li>
                <li><a href=''>Ranchi</a></li>
                <li><a href=''>Srinagar</a></li>
                <li><a href=''>Surat</a></li>
                <li><a href=''>Trivandrum</a></li>-->
            </ul>
        </div>
		</div>

		<!-- Select City Division Ends -->

		<!-- Select Category Division -->

		<div id="categoryBox">
			<h2 class='catBoxHead'>Choose Category<span>x</span></h2>

			<ul>
				<?php
					$catLine=mysql_query("SELECT * FROM category");
					while($catRow=mysql_fetch_array($catLine))
					{
						?>
						<li><a href='searchCAT.php?cat=<?php echo $catRow['category']; ?>'><?php echo $catRow['category']; ?></a></li>
						<?php
					}
				?>
			</ul>
		</div>

		<!-- Select Category Division Ends -->

		<!-- Extra Plugins Ends -->

		<!-- TASKBAR DIV -->
		

		<div id="taskbar">
			<div class="centre">
				<p>BookSiders - Home</p>

				<!-- Right Side buttons -->
				<div id="rightTaskbarButtons">
					<ul class="taskNav">
						<li class="wishList">
							<div class="wishBox"><p><span>0</span> Items in Wish-List</p></div>
						</li>
						<li class="myAccount"><?php echo $userName; ?>
							<ul class="accountNav">
							    
								
								<?php 
								echo $signin;
								echo $editad;
								echo $deletead;
								
								 echo $logout;?>
							</ul>
						</li>
					</ul>	
				</div>
			</div>
		</div>

		<!-- TASKBAR DIV ENDS-->

		<!-- MAIN HEADER STARTS -->

		<div id="header">
			<div class="centre">
				<a href="index.php"><img id="logo" src="images/logo-full-black.png" width="45" height="45" /></a>

				<ul id="menu">
					<a href=""><li>CATEGORY</li></a>
					<a href="inside/"><li>INSIDE</li></a>
					<a href="sellForm_login_check.php"><li>SELL</li></a>
					<?php echo $signup;?>
				</ul>

				<!-- menu for smartphones and ipads -->
				<p class="menuDrop">Menu Drop</p>
				<ul id="navDrop">
					<a href=""><li>SEARCH</li></a>
					<a href=""><li>CATEGORY</li></a>
					<a href=""><li>INSIDE</li></a>
					<a href="sellForm_login_check.php"><li>SELL</li></a>
					<?php echo $signup;?>
				</ul>

				<p class="headSearch">SEARCH</p>

				<!-- SEARCH BAR DIV -->
				<div id="searchBar">
			
					<form action='search.php' method='POST' name="searchForm" onsubmit="return validateSearch()">
						<input type="search" autocomplete="off" id="searchInput" class="search" name="searchInput" onkeyup="searchHint(this.value)" value="Search Here" onblur="if (this.value == '') {this.value = 'Search Here';}" onfocus="if (this.value == 'Search Here') {this.value = '';}" />
						<input type="submit" class='searchSubmit' />
					</form>						
				</div>

				<!-- Search Suggestion Box Div 
				<div id="suggestBox">
						<div class="citySuggestDiv">
							
							<div class="citySuggest" id="citySuggest"></div>
						</div>
				</div>
				-->
			</div>
		</div>

		<!-- MAIN HEADER ENDS -->

		<!-- Display Panel Division -->
		<!-- All CSS files in index.css -->

		<!--<div id="tips">
			<p>Tips: <span>Start typing your book's name without clicking on search button</span></p>
		</div>-->

		<!-- virtual box for opening other pages -->

		<div id="virtual"></div>

		<article>

			<div class="page">

				<div id="tips">
					<p>Tips: <span></span></p>
				</div>

				<div id="bookInfo">
					<div id="bookCoverContainer">
						<img src="<?php echo $thumb; ?>" class="bookCover" /> 
					</div>
					

					<div id="bookInfoContainer">
						<h1 id="bookTitle"><?php echo $title; ?></h1>
						<h2>By: <span><?php echo $author; ?></span></h2>

						<p class='rating'>Inside Rating: </p>
						

						<button style="display: none;" class="rating-enable">enable</button>
						<div class="rating-c">		       
				            <select id="example-c" name="rating" title="Be honest in rating ">
				                <option value=""></option>
				                <?php if($rating == 1) { ?>
				                	<option selected value="1">1</option>
				                <?php } else { ?>
				                	<option value="1">1</option>
								<?php } ?>

								<?php if($rating == 2) { ?>
				                	<option selected value="2">2</option>
				                <?php } else { ?>
				                	<option value="2">2</option>
								<?php } ?>

								<?php if($rating == 3) { ?>
				                	<option selected value="3">3</option>
				                <?php } else { ?>
				                	<option value="3">3</option>
								<?php } ?>

								<?php if($rating == 4) { ?>
				                	<option selected value="4">4</option>
				                <?php } else { ?>
				                	<option value="5">5</option>
								<?php } ?>

								<?php if($rating == 6) { ?>
				                	<option selected value="6">6</option>
				                <?php } else { ?>
				                	<option value="6">6</option>
								<?php } ?>

								<?php if($rating == 7) { ?>
				                	<option selected value="7">7</option>
				                <?php } else { ?>
				                	<option value="7">7</option>
								<?php } ?>

								<?php if($rating == 8) { ?>
				                	<option selected value="8">8</option>
				                <?php } else { ?>
				                	<option value="8">8</option>
								<?php } ?>

								<?php if($rating == 9) { ?>
				                	<option selected value="9">9</option>
				                <?php } else { ?>
				                	<option value="9">9</option>
								<?php } ?>
								
								<?php if($rating == 10) { ?>
				                	<option selected value="10">10</option>
				                <?php } else { ?>
				                	<option value="10">10</option>
								<?php } ?>
				            </select>
				        </div>

				        <h2>Pages: <span><?php echo $pages; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Publication: <span><?php echo $publication; ?></span></h2>

                <div id="socialshares" style="padding: 5px 0px 5px 0px;">
                  <span class='st_facebook_hcount' displayText='Facebook'></span>
                  <span class='st_twitter_hcount' displayText='Tweet'></span>
                  <span class='st_email_hcount' displayText='Email'></span>
                  <span class='st_fblike_hcount' displayText='Facebook Like'></span>
                </div>

				        <p class="bookDiscription"><?php echo $desc; ?></p>

					</div>	
					<div class="clear"></div>

				</div>

				<div id="userAd">
					<h2>People Selling this Book</h2>
					
					<?php
					$qq = "SELECT * FROM `book_ad` WHERE `bname`='$title' order by `ad_quality` desc";

					$userAd = mysql_query($qq);
          $pathPic = "images/sample.jpg";
					while($adRow = mysql_fetch_array($userAd))
					{
            $user_id = $adRow['uid'];
            $g = "SELECT * FROM `registered_users` WHERE `uid`='$user_id'";
            $guy = mysql_query($g);
            if($guyRow = mysql_fetch_array($guy))
              $imageUser = $guyRow['profile_pic'];

            if($imageUser != "")
              $pathPic = $imageUser;
					?>
					<a href="adPage.php?ad_id=<?php echo $adRow['ad_id']; ?>">
					<div id="adContainer">
						<img src="<?php echo $pathPic; ?>" class="userPic"/>
						<div class="userInfo">
							<p class="userName"><?php echo $adRow['name']; ?></p>
							<p class="userAddress"><?php echo $adRow['landmark']; ?></p>
							<!-- <p class="distance"><span>500m</span> from your location</p> -->
						</div>



						<div class="userPrice">
							<p class="priceTag">Rs <?php echo $adRow['price']; ?></p>
							
						</div>

						<div class="condition">
							<p>Condition: <?php echo $adRow['description']; ?></p>
						</div>

						<div class="clear"></div>
					</div>
					</a>

					<?php } ?>

				</div>

			</div>

		</article>


		<!-- Footer Starts -->

		<div id="footer">
			<h2 class="footerSocial">
				<div class="socialFooter">
					<ul>
						<li class="facebook"></li>
						<li class="twitter"></li>
						<li class="linkedin"></li>
						<li class="googleplus"></li>
					</ul>
				</div>
			</h2>
			<h1 class='footerHeading'>"Lets use, sell and share"</h1>
			<div class="page">
				<form action='email_signup.php' method='POST' name="newsForm">
					<input type="text" name="newsEmail" id="newsEmail" value="Enter Email" onblur="if (this.value == '') {this.value = 'Enter Email';}" onfocus="if (this.value == 'Enter Email') {this.value = '';}" />
					<input type="submit" value="Sign for Newsletter" />
				</form>

				<ul class="footerTabs">
					<li><a href="">Privacy</a></li>
					<li><a href="">Contact Us</a></li>
					<li><a href="">About Us</a></li>
					<li><a href="">Help</a></li>
					<li><a href="">Terms of use</a></li>
				</ul>

				<p>A Pyrobook product. Copyright &copy; 2015. All rights reserved.</p>
				<p>Developed by kryptotech.</p>
			</div>
		</div>	

		<!-- Footer Starts Ends -->

	</body>
</html>