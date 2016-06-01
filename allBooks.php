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

if(isset($_GET['status']))
{
	$status = $_GET['status'];
	if($status == "logout")
	{
		$msg = "Logged out Successfully";
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
		<link rel="stylesheet" type="text/css" href="css/home.css" />
		<link rel="stylesheet" type="text/css" href="css/header.css" />
		<link rel="stylesheet" type="text/css" href="css/fonts.css" />
		<link rel="stylesheet" type="text/css" href="css/footer.css" />
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:500px)" href="css/small_style.css" />
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:501px) and (max-width:800px)" href="css/medium_style.css" />

		<!-- JAVASCRIPT LINKED HERE -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>	
	<script type="text/javascript" src="js/jquery-1.11.1.min.js" ></script>
	<script type="text/javascript" src="js/main.js" ></script>

		<!-- creating a global variable for cities -->
		<script type="text/javascript">
			var city="city";
			var selectedCity = '';

			
		</script>

		<?php
		if(isset($_GET['status']))
		{
			$status = $_GET['status'];
			if($status == "logout")
			{
				$msg = "Logged out Successfully";
				?>
				<style type="text/css">
					#notificationHead{
						display: block;
						background: #E41B17;
					}
				</style>
				<?php
			}
		}
?>


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
	
	</head>

	<body>

		<div id="notificationHead">
			<p class="topNotification" id="topNotification"><?php echo $msg; ?></p>
			<button class="closeNotification">X</button>
		</div>

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

				<div id="allContainer">
					<h1>All Books at sale on BookSiders</h1>
					<?php
					$q1	= "SELECT DISTINCT bname, img, isbn, author FROM book_ad";

					$level = mysql_query($q1,$con);

					while($row = mysql_fetch_array($level))
					{
					?>

					<div class="oneBook">
						<a href="book.php?isbn=<?php echo $sresult['isbn']; ?>&name=<?php echo $sresult['bname']; ?>"><img src="<?php echo $row['img']; ?>" /></a>
						<div class="oneDesc">
							<a href="book.php?isbn=<?php echo $row['isbn']; ?>" ><p><?php echo $row['bname']; ?></p></a>
							<p class="lowFont">By: <?php echo $row['author']; ?></p>
							<p class="lowFont">ISBN: <?php echo $row['isbn']; ?></p>
						</div>

						<div class="clear"></div>
					</div>

					<?php
					}
					?>
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