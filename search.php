<?php include("connectdb.php"); 
session_start();
$_SESSION['search']=$_POST['searchInput'];


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

$searchValue = $_POST['searchInput'];


?>

<!doctype html>
<html lang="en">
	<head>
		<link rel="shortcut icon" href="booksidersLogo.png" />
		<title>BookSiders</title>

		<!-- SEO GOES HERE. META AND ALL -->

		<meta name="viewport" content="width=device-width" />

		<!-- CSS LINKED HERE -->
		<link rel="stylesheet" type="text/css" href="css/home.css" />
		<link rel="stylesheet" type="text/css" href="css/header.css" />
		<link rel="stylesheet" type="text/css" href="css/search.css" />
		<link rel="stylesheet" type="text/css" href="css/fonts.css" />
		<link rel="stylesheet" type="text/css" href="css/footer.css" />
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:500px)" href="css/small_style.css" />

		<!-- JAVASCRIPT LINKED HERE -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>			
	<script type="text/javascript" src="js/jquery-1.11.1.min.js" ></script>
	<script type="text/javascript" src="js/main.js" ></script>

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
	left: 5%;
	border: 1px #E5E4E2 solid;
	background: #ecf0f1;
	border-radius: 5px;
	width: 315px;
	margin: 0 auto;
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
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
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

function searchLoad()
     {
        $('#filterBox').css({bottom: '0px'});
     }

</script>	
	
	</head>

	<body onLoad="searchLoad();">

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
            			<li class='allCity'><a href=''><?php echo $cityRow['city'] ?></a></li>
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
						<li class="allCategory"><a href=''><?php echo $catRow['category']; ?></a></li>
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
					<a href="inside/"><li>INSIDE</li></a>
					<a href="sellForm_login_check.php"><li>SELL</li></a>
					<?php echo $signup;?>
				</ul>

				<p class="headSearch">SEARCH</p>

				<!-- SEARCH BAR DIV -->
				<div id="searchBar">
					<form action='' method='POST' name="searchForm" onsubmit="return validateSearch()">
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
					<p>Tips: <span>Start typing your book's name without clicking on search button</span></p>
				</div>	

				<div id="searchArea">
					<h1>Searching for: "<?php echo $searchValue; ?>"</h1>
					<div id="resultRow">
						<?php        
						$search=$_SESSION['search'];
						
						$q1	= "SELECT DISTINCT bname, img, isbn FROM book_ad WHERE bname like '%$search%' or author like '%$search%' or isbn like '%$search%'";
						if(!$result=mysql_query($q1,$con))
						{
							// echo mysql_error();
						}
						else
						 {
							 while($sresult=mysql_fetch_array($result))
							 {
									 
									 
						?>	
						<a href="book.php?isbn=<?php echo $sresult['isbn']; ?>&name=<?php echo $sresult['bname']; ?>">
						<div class="bookHolder" style="background:url(<?php echo $sresult['img'];?>) no-repeat;background-size:100% 100%;">
							<div class="bookCover">
								<p><?php echo  $sresult['bname'];?></p>
								<p></p>
							</div>
						</div></a>
									
					<?php
							}
						}
					?>
						<div class="clear"></div>	
					</div>						
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