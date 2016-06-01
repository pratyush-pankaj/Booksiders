<?php include("connectdb.php"); 
session_start();
$signin="<a href='signIn.php' class='opeSignInBox'><li>Sign In</li></a>";
$signup="<a href='signUp.php'><li class='opeSignUpBox'>SIGN UP</li></a>";
$uname['user_name']="";
$userName="My Account";
$logout="";
$editad="";
$deletead="";
$active="";
if(isset($_SESSION['nID'])&&!empty($_SESSION['nID']))
{$signin="";
 $signup="";
 $uid=$_SESSION['nID'];

$q1 = "SELECT *     
         FROM `registered_users`  
         WHERE `uid`='$uid'";
         $records=mysql_query($q1);
         $uname=mysql_fetch_array($records);
    $userName=$uname['user_name'];
	$dp=$uname['profile_pic'];
	$active = $uname["status"];

	if($dp == "")
	{
		$dp = "images/profilepicexample.png";
	}
	$logout="<a href='logout.php'><li>Log out</li></a>";
	$editad="<a href='dashboard.php'><li>Edit Ad</li></a>";
    $deletead="<a href='dashboard.php'><li>Delete Ad</li></a>";	
		 
}


?>

<!doctype html>
<html lang="en">
	<head>
		<link rel="shortcut icon" href="booksidersLogo.png" />
		<title>Booksiders</title>

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

		<meta name="viewport" content="width=device-width" />

		<!-- CSS LINKED HERE -->
		<link rel="stylesheet" type="text/css" href="css/dashboard.css" />
		<link rel="stylesheet" type="text/css" href="css/header.css" />
		<link rel="stylesheet" type="text/css" href="css/fonts.css" />
		<link rel="stylesheet" type="text/css" href="css/footer.css" />
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:500px)" href="css/small_style.css" />

		<!-- JAVASCRIPT LINKED HERE -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>	
	<script type="text/javascript" src="js/jquery-1.11.1.min.js" ></script>
	<script type="text/javascript" src="js/main2.js" ></script>

		<!-- creating a global variable for cities -->
		<script type="text/javascript">
			var city="city";
			var selectedCity = '';
			var stopSearch="asdasd";
		</script>

		<?php
		if($active == 0)
		{
			$msg = "Your Email is not verified. Please check your Inbox.";
			?>
			<style type="text/css">
				#notificationHead{
					display: block;
					background: #E41B17;
				}
			</style>
			<?php
		}
		?>


		

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

	<body class="dashboardBody">

		<div id="notificationHead">
			<p class="topNotification" id="topNotification"><?php echo $msg; ?></p>
			<button class="closeNotification">X</button>
		</div>


		<script type="text/javascript">
		function PreviewProfile() 
		{
    
	        var oFReader = new FileReader();
	        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
	    
	        oFReader.onload = function (oFREvent) {
	        document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
};
	</script>


		<!-- Extra Plugins -->

		<!-- Extra City Panel -->

		

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
				<p>Booksiders - Dashboard</p>

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
					
				</ul>

				<!-- menu for smartphones and ipads -->
				<p class="menuDrop">Menu Drop</p>
				<ul id="navDrop">
					<a href=""><li>SEARCH</li></a>
					<a href=""><li>CATEGORY</li></a>
					<a href="inside/"><li>INSIDE</li></a>
					<a href="sellForm_login_check.php"><li>SELL</li></a>
					
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

		<!-- <h1 class="mydashBoard">My Dashboard</h1> -->

		<article>

		<div class="page">	

		<div id="dashbox">
			<div id="dashboxLeft">
				<div id="profileTab">
					<div id="imageHolder"><img src="<?php echo $dp; ?>"  width="100" height="100" class="profilePic"/></div>
					<p class="nameOfUser"><?php echo $uname['user_name'];?></p>

					<ul class="dashTabs">
						<li class="notify">Notification</li>
						<li class="yourAds">Your Ads</li>
						<li class="yourSettings">Settings</li>
						<li class="yourShop">Store</li>
					</ul>
				</div>

			</div>
			<h1 class="mydashBoard">Dashboard</h1>
			<div id="dashboardContent">
				<div id="dashboxRight">
					<h2>Welcome to our World :)</h2>
					<div class="bulbHolder">
						<img src="images/bulb.png" width="350" height="350" />
					</div>
				</div>
			</div>

			<div class="clear"></div>
		</div>

		</div>

		</article>




</body>
</html>