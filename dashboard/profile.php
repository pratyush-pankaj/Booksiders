<!-- Ads -->
<?php
include("../connectdb.php"); 
session_start();
$uid=$_SESSION['nID'];
$q1 = "SELECT *      
         FROM `registered_users`  
         WHERE `uid`='$uid'";
         $records=mysql_query($q1);
         $row=mysql_fetch_array($records);
		
         
	

		if ($row['profile_pic']=="")
		 {
			$dp=$row['profile_pic'];
			$dp="images/profilepicexample.png";
		 }
		 else
		 
{
		$dp=$row['profile_pic'];
}		

?>

<html>
<head>
	<title>Your Notifications</title>


	<link rel="stylesheet" type="text/css" href="../css/dashboard.css" />
	<link rel="stylesheet" type="text/css" href="../css/fonts.css" />

	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>	
	<script type="text/javascript" src="../js/jquery-1.11.1.min.js" ></script>
	<script type="text/javascript" src="../js/main.js" ></script>

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
	<div id="notificationBox">
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
		<h1>Your Profile</h1>
		<form action="edit_profile.php" method="POST" enctype="multipart/form-data">
			
			<ul class="yourProfile">
				<li>
					<div id="imageHolder"><img src="<?php echo $dp;?>" width="150" height="150" class="profilePic" id="uploadPreview"/></div>
					<div id="buttonHolder">
						<div class="fileUpload btn-upload">
							<span>Upload Image</span>
							<input type="file" value="Upload Photo" id="uploadImage" class="imgUp" title="Upload the picture here" name="imageBook" onchange="PreviewProfile();" />
						</div>
					</div>
				</li>
				<li>
					<p>Phone no </p>
					<input type="text" name="no" value="<?php echo $row['phone_no']; ?>" placeholder="Enter your phone no" />
				</li>
				<li>
	
					<p>Local Address: </p>
					<input id="pac-input" name="landmark" class="controls locationInput" type="text"
	        placeholder="Enter Landmark/Institute/Addresses Eg. Adarsh Nagar" value="<?php echo $row['location'];?>">
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
				</li>
				<input type="submit" class="makeChangeButton" value="Make Change" />
			</ul>
		</form>
	</div>
</body>
</html>