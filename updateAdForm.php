<?php include("connectdb.php"); 
$id=$_GET['ad_id'];
$records=mysql_query("select*from book_ad where ad_id='$id'");
if($row=mysql_fetch_array($records))
$selected=$row["rating"];
$selected2=$row["description"];
{

?>



<!doctype html>
<html lang="en">
	<head>
		<link rel="shortcut icon" href="favicon.png" />
		<title>Pyrobook</title>

		<!-- SEO GOES HERE. META AND ALL -->

		<meta name="viewport" content="width=device-width" />

		<!-- CSS LINKED HERE -->
		<link rel="stylesheet" type="text/css" href="css/sellForm.css" />
		<link rel="stylesheet" type="text/css" href="css/header.css" />
		<link rel="stylesheet" type="text/css" href="css/fonts.css" />
		<link rel="stylesheet" type="text/css" href="css/footer.css" />
		<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen and (max-width: 650px)" />
		<link rel="stylesheet" type="text/css" href="css/jquery.tagsinput.css" />
		<link rel="stylesheet" type="text/css" href="css/rating.css" />

		<!-- JAVASCRIPT LINKED HERE -->

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>		
<script type="text/javascript" src="js/jquery-1.11.1.min.js" ></script>
<script type="text/javascript" src="js/jquery.tagsinput.js"></script>
<script type="text/javascript" src="js/jquery.barrating.js"></script>
<script type="text/javascript" src="js/main.js" ></script>
<script type="text/javascript" src="js/sellValidation.js" ></script>


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

</script>

<!-- Location ends -->

	

		<!-- creating a global variable for cities -->
		
		
		<script type="text/javascript">

			$(function () {
	                           
	                $('#example-c').barrating('show', {
	                    showValues:true,
	                    showSelectedRating:false
	                });

        	});

        </script>

        <script type="text/javascript">

			$(function() {

				$('#pickCategory').tagsInput({width:'300px'});
				$('#landmark').tagsInput({width:'300px'});

			});

			
		</script>

		<script type="text/javascript">
			var city="city";
			var selectedCity = '';
		</script>
	</head>

	<body>

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
            			<li class='allCity'><?php echo $cityRow['city'] ?></li>
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
						<li class='allCategory'><?php echo $catRow['category']; ?></li>
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
				<p>Pyrobook - Home</p>

				<!-- Right Side buttons -->
				<div id="rightTaskbarButtons">
					<ul class="taskNav">
						<li class="wishList">
							<div class="wishBox"><p><span>0</span> Items in Wish-List</p></div>
						</li>
						<li class="myAccount">My Account
							
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
					<a href=""><li>INSIDE</li></a>
					<a href=""><li>SELL</li></a>
					
				</ul>

				<!-- menu for smartphones and ipads -->
				<p class="menuDrop">Menu Drop</p>
				<ul id="navDrop">
					<a href=""><li>SEARCH</li></a>
					<a href=""><li>CATEGORY</li></a>
					<a href=""><li>INSIDE</li></a>
					<a href=""><li>SELL</li></a>
					
					
				</ul>

				<p class="headSearch">SEARCH</p>

				<!-- SEARCH BAR DIV -->
				<div id="searchBar">
					<form action='' method='POST' name="searchForm" onsubmit="return validateSearch()">
						<input type="search" autocomplete="off" id="searchInput" class="search" name="searchInput" onkeyup="searchHint(this.value)" value="Search Here" onblur="if (this.value == '') {this.value = 'Search Here';}" onfocus="if (this.value == 'Search Here') {this.value = '';}" />
						<input type="submit" class='searchSubmit' />
					</form>						
				</div>

				<!-- Search Suggestion Box Div -->
				<div id="suggestBox">
						<div class="citySuggestDiv">
							<!--<p class='cityAsitis'>- City</p>-->
							<div class="citySuggest" id="citySuggest"></div>
						</div>
				</div>

			</div>
		</div>

		<!-- MAIN HEADER ENDS -->

		<!-- Display Panel Division -->

		<!-- Mandatory Form Starts -->

		<!-- virtual box for opening other pages -->

		<div id="virtual"></div>

		<div class="centre leaveTop">
			<div id="tips" class="sellFormTips">
					<p>Tips: <span>Start typing your book's name without clicking on search button</span></p>
			</div>
		</div>

		<div class="centre">
		<form id="sellForm" name="sellForm" action="updateAdForm_entry.php" method="POST" enctype="multipart/form-data">
			<div id="mandatory">
				<h1 class="heading1">Update Your Ad:<span></span></h1>

				<div id="mandForm">
					<div class="mandKaP">
						<p>
							<span>Name of your Item:</span><input type="text" name="nameBook" class="nameBook" title="Enter the name of your reading material" value="<?php echo $row['bname'];?>"/>
							<input type="text" name="ad_id" class="nameBook" style="display:none;" value="<?php echo $id;?>"/>
							<div class="validBox validName">
								<img src="images/wrong.png" width="30" height="30" title="Title should be of atleast 5 characters" />
							</div>
						</p>
					</div>

					<div class="mandKaP">
						<p>Photo of the item: </p>
						<div class="picUploadDiv">
							<div class="picHolder">
								<img  src="<?php echo $row['img'];?>" id="uploadPreview" />
								<div class="fileUpload btn-upload">
									<span>Upload Image</span>
									<input type="file" value="Upload image" id="uploadImage" class="imgUp" title="Upload the picture here" name="imageBook" onchange="PreviewImage();" />
								</div>
							</div>
							<div class="imgDis">
								<ol>
									<li>Use real photos of the item</li>
									<li>Image can be in .jpg, .jpeg, .gif, .png</li>
									<li>Donot use dark photos</li>
									<li>Press upload again to change</li>
								</ol>	
							</div>
						</div>
						<div class="validBox validPic"><img src="images/wrong.png" width="30" height="30" title="Error with image" /></div>
					</div>

					<div class="mandKaP"><p><span>Your Price:</span><input type="text" name="price" class="price" value="<?php echo $row['price'];?>"  /></p> <div class="validBox validPrice"><img src="images/wrong.png" width="30" height="30" title="This can be only in numbers(Rupees)" value="23" /></div> </div>
					<div class="mandKaP"><p><span>Your Name:</span><input type="text" name="nameSeller" class="nameSeller"value="<?php echo $row['name'];?>"  <?php?>/></p> <div class="validBox validUser"><img src="images/wrong.png" width="30" height="30" title="Should be of atleast 3 characters" /></div> </div>
					<div class="mandKaP"><p><span>Your Phone no:</span><input type="text" name="phone" class="phone" value="<?php echo $row['phone'];?>" /></p> <div class="validBox validPhone"><img src="images/wrong.png" width="30" height="30" title="10 Digit phone number" /></div> </div>
					<div class="mandKaP"><p><span>Your City:</span><input type="text" name="city" id="pickCity" class="pickCity"value="<?php echo $row['city'];?>" /></p> <div class="validBox validCity"><img src="images/wrong.png" width="30" height="30" title="Select city from the list" /></div> </div>
				</div>	

			</div>
		
		<!-- Mandatory Form Starts Ends -->

		<!-- Advanced Form Starts Here -->

		<div id="advanced">
			<p class="advanced-p">
				<button class="advanceFormButton">Advanced Form</button>
				<span>Click this to update more fields if needed.</span>
			</p>

			<div id="adForm">
				<p><span>ISBN 13:</span><input value="<?php echo $row['isbn'];?>" class="author" type="text" name="isbn" title="Enter the ISBN 13 code located on the back of your book cover"/></p>
				<p><span>Publication:</span><input value="<?php echo $row['publication'];?>" class="publication" type="text" name="publication" title="" /></p>
				<p><span>Author:</span><input value="<?php echo $row['author'];?>" class="author" type="text" name="author" /></p>
				<p><span>Edition:</span><input value="<?php echo $row['edition'];?>" class="edition" type="text" name="edition" /></p>

				
				<p><span>Original Price:</span><input value="<?php echo $row['org_price'];?>" class="originalPrice" type="text" name="originalPrice" title ="MRP of item" /></p>
				<p><span>Category:</span>
					<input type="text" value="<?php echo $row['category'];?>" name="category" id="pickCategory" class="tags" />
				</p>
				<!-- <p><span>Location:</span>
					<div id="map-canvas" style=" height: 400px;width: 300px;margin: 0px;padding: 0px">
						<input type="text" name="landmark" id="pac-input" class="tags controls" placeholder="Enter a location" />
						<div id="type-selector" class="controls" style="display:none;">
					      <input type="radio" name="type" id="changetype-all" checked="checked">
					      <label for="changetype-all">All</label>
					    </div>  
					</div>
				</p> -->
				<p>
					<span>Location</span>
						<input value="<?php echo $row['landmark'];?>"id="pac-input" name="landmark" class="controls locationInput" type="text"
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
				</p>

				<p>
					<span>Condition of the Item:</sp	an>
					<select name="discription" id="discription">
					<option <?php if($selected2=='unrated'){echo "selected";}?>value="unrated">Rate your the book condition</option>
					<option <?php if($selected2=='Good Condition'){echo "selected";}?>value="Good Condition">Good Condition</option>
					<option <?php if($selected2=='Fair'){echo "selected";}?>value="Fair">Fair</option>
					<option <?php if($selected2=='Slightly Torn'){echo "selected";}?>value="Slightly Torn">Slightly Torn</option>
					<option <?php if($selected2=='Readable'){echo "selected";}?>value="Readable">Readable</option>
					<option <?php if($selected2=='ok..ok..take this at very less price'){echo "selected";}?>value="ok..ok..take this at very less price">ok..ok..take this at very less price</option>
					</select>
				</p>
				<p>Review this Book: </p>
				<textarea value="" class="review" name="review" placeholder="How do you feel when you read this book"><?php echo $row['review']; echo $selected; echo $selected2;?></textarea>
				<p>Rate this Book(as per content quality):</p>
				<button style="display: none;" class=" rating-enable">enable</button>
				<div class="rating-c">		       
		            <select id="example-c" name="rating" title="Be honest in rating ">
		                
		                <option <?php if($selected=='1'){echo "selected=\"selected\"";}?>value="1">1</option>
		                <option <?php if($selected=='2'){echo "selected=\"selected\"";}?>value="2">2</option>
		                <option <?php if($selected=='3'){echo "selected=\"selected\"";}?>value="3">3</option>
		                <option <?php if($selected=='4'){echo "selected=\"selected\"";}?>value="4">4</option>
		                <option <?php if($selected=='5'){echo "selected=\"selected\"";}?>value="5">5</option>
		                <option <?php if($selected=='6'){echo "selected=\"selected\"";}?>value="6">6</option>
						<option <?php if($selected=='7'){echo "selected=\"selected\"";}?>value="7">7</option>
						<option <?php if($selected=='8'){echo "selected=\"selected\"";}?>value="8">8</option>
						<option <?php if($selected=='9'){echo "selected=\"selected\"";}?>value="9">9</option>
						<option <?php if($selected=='10'){echo"selected=\"selected\"";}?>value="10">10</option>
		            </select>
		        </div>
				
			</div>

		</div>	
		<!--
		<div id="signUpTab">
			
			<p class='signUpAd'>You are one step away from signing up. <a href="" class="openSignUpBox signUpA">Sign up</a> now to get access to every function.</p>

		</div> --!>

		

		<!-- Advanced Form Starts Ends -->

		<div id="final">
			<p><input type="checkbox" name="terms" class="termsCheckBox" />accept Terms &amp; conditions</p>
		</div>

		<div class='buttonContainerPost'>
			<input type="submit" value="Update Your Ad" class="submitAd basicButton" />
		</div>	
			
		</form>

		</div>

		<!-- Footer Starts -->

		<div id="footer">
			<h1 class='footerHeading'>"Lets use, sell and share"</h1>
			<div class="centre">
				<form>
					<input type="text" name="newsEmail" id="newsEmail" value="Enter Email" onblur="if (this.value == '') {this.value = 'Enter Email';}" onfocus="if (this.value == 'Enter Email') {this.value = '';}" />
					<input type="submit" value="Sign for Newsletter" />
				</form>

				<ul>
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
	</body>
</html>
<?php 
}
					  ?>
