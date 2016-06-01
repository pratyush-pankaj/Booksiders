<?php include("connectdb.php");
session_start();
if(isset($_SESSION['nID'])&&!empty($_SESSION['nID']))
{
 $uid=$_SESSION['nID'];

$q1 = "SELECT `user_name`      
         FROM `registered_users`  
         WHERE `uid`='$uid'";
         $records=mysql_query($q1);
         $uname=mysql_fetch_array($records);
    $userName=$uname['user_name'];     
	
		 
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

		<meta name="viewport" content="width=device-width" />

		<!-- CSS LINKED HERE -->

		<link rel="stylesheet" type="text/css" href="css/profile.css" />
		<link rel="stylesheet" type="text/css" href="css/header.css" />
		<link rel="stylesheet" type="text/css" href="css/fonts.css" />
		<link rel="stylesheet" type="text/css" href="css/footer.css" />
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:500px)" href="css/small_style.css" />


		<!-- JAVASCRIPT LINKED HERE -->
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>	
	<script type="text/javascript" src="js/jquery-1.11.1.min.js" ></script>
	<script type="text/javascript" src="js/main.js" ></script>

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
	left: 0px;
	border: 1px #E5E4E2 solid;
	background: #ecf0f1;
	border-radius: 5px;
	width: 338px;
	margin: 10px auto;
	height: 40px;
	padding: 10px;
	padding-left: 10px;
	font-family: robotoLight;
	font-size: 14px;
	color: #333;
	transition: all 0.3s ease-in;
      }

      /*#pac-input:focus {
        border: 1px #A74AC7 solid !important;
	background: #A74AC7 !important;
	color: #fff !important;
      }*/

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

		<div id="profile" class="page">
			<h1><?php echo $userName ?>,</h1>
			<h2>Welcome to BookSiders</h2>
			<h3>Just a few more things</h3>

			<form id="profileForm" action="profile_entry.php" method="POST" enctype="multipart/form-data">

				<input class="phoneNoProfile" type="text" name="phone" value="" placeholder="Your Phone Number" />

				<input id="pac-input" name="landmark" class="controls locationInput" type="text"
	        placeholder="Enter Landmark/Institute/Addresses Eg. Adarsh Nagar">
							    <div id="type-selector" class="controls" style="display:none;">
							      <input type="radio" name="type" id="changetype-all" checked="checked">
							      <label for="changetype-all">All</label>

							      <input type="radio" name="type" id="changetype-establishment">
							      <label for="changetype-establishment">Establishments</label>

							      <input type="radio" name="type" id="changetype-address">
							      <label for="changetype-address">Addresses</label>

							      <input type="radio" name="type" id="changetype-geocode">
							      <label for="changetype-geocode">Geocodes</label>
							    </div>
							    <div id="map-canvas"></div>

				<div class="fileUpload btn-upload">
					<span>Upload Image</span>
					<input type="file"  id="uploadImage" class="imgUp" title="Upload the picture here" name="imageBook" onchange="PreviewImage();" />
				</div>

				<div class="clear"></div>

				<a href="dashboard.php"> <p class="skip botButtons">SKIP</p></a>

				<input type="submit" value="NEXT" class="next botButtons" />

				<div class="clear"></div>

			</form>
			<div class="clear"></div>
		</div>

	</body>
</html>