<?php 


        if(session_status()!=PHP_SESSION_ACTIVE) {session_start();}
		    @ob_start();
  
include("connectdb.php"); 

$signin="<a href='signIn.php' class='opeSignInBox'><li>Sign In</li></a>";
$signup="<a href='signUp.php'><li class='opeSignUpBox'>SIGN UP</li></a>";
$uname['user_name']="";
$userName="My Account";
$phoneno="";
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
    $phoneno=$uname['phone_no'];  
	$logout="<a href='logout.php'><li>Log out</li></a>";
	$editad="<a href='dashboard.php'><li>Edit Ad</li></a>";
    $deletead="<a href='dashboard.php'><li>Delete Ad</li></a>";	
		 
	$active = $uname['status'];	 
}
?>

<!doctype html>
<html lang="en">
	<head>
		<link rel="shortcut icon" href="booksidersLogo.png" />
		<title>BookSiders | SellForm</title>

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
		<link rel="stylesheet" type="text/css" href="css/sellForm.css" />
		<link rel="stylesheet" type="text/css" href="css/header.css" />
		<link rel="stylesheet" type="text/css" href="css/fonts.css" />
		<link rel="stylesheet" type="text/css" href="css/footer.css" />
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:500px)" href="css/small_style.css" />
		<link rel="stylesheet" type="text/css" href="css/jquery.tagsinput.css" />
		<link rel="stylesheet" type="text/css" href="css/rating.css" />
		

		<!-- JAVASCRIPT LINKED HERE -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>		
<script type="text/javascript" src="js/jquery-1.11.1.min.js" ></script>
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
  
        outline: none;
        /*box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);*/
      }

      #pac-input {
    background: #FAFAFA;
	border: 1px #bdc3c7 solid;
	margin: 4px 0px 2px 0px;
	padding: 7px;
	width: 100%;
	box-sizing: border-box;
	font-family: Sourcesans;
	font-size: 16px;
	color: #333;
      }

      #pac-input:focus {
        border: 1px #A74AC7 solid;
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

<script type="text/javascript">
	var val1 = document.forms["sellForm"]["nameBook"].value;
	var val2 = document.forms["sellForm"]["price"].value;
	var val3 = document.forms["sellForm"]["nameSeller"].value;
	var val4 = document.forms["sellForm"]["phone"].value;
	var val5 = document.forms["sellForm"]["city"].value;
	var test1=0;
	var test2=0;
	var test3=0;
	var test4=0;
	var test5=0;
	//realValidation Here
	function realValidate()
	{	
		
		var bookPic = document.forms["sellForm"]["imageBook"].value;
		var go1 = $(".go1").val();
        var go2 = $(".go2").val();
        var go3 = $(".go3").val();
        var go4 = $(".go4").val();

        document.forms["sellForm"]["phone"].focus();
        document.forms["sellForm"]["phone"].blur();

		//term and condition checked
		if(document.forms["sellForm"]["terms"].checked==false)
		{
			$(".topNotification").text("Please agree to the Terms and Conditions");
			$("#notificationHead").css({background: '#E41B17'});
			$("#notificationHead").slideDown();
			return false;
		}

		

		if(bookPic==''||bookPic==null)
		{
			$(".topNotification").text("No image inserted. Please upload one.");
			$("#notificationHead").css({background: '#E41B17'});
			$("#notificationHead").slideDown();
			return false;
		}

		if(test1!=0||val1=='')
		{
			$(".topNotification").text("There is some problem in Name of item field");
			$("#notificationHead").css({background: '#E41B17'});
			$("#notificationHead").slideDown();
			return false;
		}

		if(test2!=0||val2=='')
		{
			$(".topNotification").text("There is some problem in the Price field.");
			$("#notificationHead").css({background: '#E41B17'});
			$("#notificationHead").slideDown();
			return false;
		}

		if(test4!=0||val4=='')
		{
			$(".topNotification").text("There is some problem in your Phone number.");
			$("#notificationHead").css({background: '#E41B17'});
			$("#notificationHead").slideDown();
			return false;
		}

		if(test5!=0||val5=='')
		{
			$(".topNotification").text("There is some problem in the city field");
			$("#notificationHead").css({background: '#E41B17'});
			$("#notificationHead").slideDown();
			return false;
		}

		if(go1,go2,go3,go4 !="")
		if( go1==go2 || go1==go3 || go1==go4 || go2==go3 || go2==go4 || go3==go4)
		{
			$(".alert-p").text("There is a duplicate entry in category tab.");
			$("#outerAlert").css({display: 'table'});
			return false;
		}

	}

	// $("#sellForm").submit(function(e)
	// {	
	//     var postData = $(this).serializeArray();
	//     var formURL = $(this).attr("action");
	//     $.ajax(
	//     {
	//         url : formURL,
	//         type: "POST",
	//         data : postData,
	//         success:function(data) 
	//         {
	//             //data: return data from server
	//             alert("went");
	//         },
	//         error: function(jqXHR, textStatus, errorThrown) 
	//         {
	//             //if fails      
	//         }
	//     });
	//     e.preventDefault(); //STOP default action
	//     e.unbind(); //unbind. to stop multiple form submit.
	// });

</script>

<!-- ISBN -->


<!-- Location ends -->

	

		<!-- creating a global variable for cities -->
		

		<script type="text/javascript">
			var city="city";
			var selectedCity = '';
			var catCategory="";
			var i=1;
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



	</head>

	<body>

		<!-- Notification Head -->

		<div id="notificationHead">
			<p class="topNotification"><?php echo $msg; ?></p>
			<button class="closeNotification">X</button>
		</div>

		<!-- Notification Head Ends -->

		<!-- All Big Alerts -->
		<div id="outerAlert">
			<div id="middle">
				<div id="alertBox">
					<ul class="alertContent">
						<p class="alert-p"></p>
						<button class="alertClose">Close</button>
					</ul>
				</div>
			</div>
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
						<li class='allCategory2'><a><?php echo $catRow['category']; ?></a></li>
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

		<!-- Mandatory Form Starts -->

		<!-- virtual box for opening other pages -->

		<div id="virtual"></div>

		<article>
			<div class="page">
				
				<div id="tips" class="sellFormTips">
					<p>Tips: <label>Enter ISBN code to auto-fetch the sell form fields</label></p>
				</div>

				<form id="sellForm" action="sell_form_entry.php" onsubmit="return realValidate()" method="POST" enctype="multipart/form-data" >
					<div id="bookInfo"></div>
					<div id="form-left">
						<h2>POST FREE AD</h2>
						<p style="font-weight:bold"><span>*</span> This side mandatory</p>
						<div class="form-centre">
							<div class="aboutISBN"><span>What is an ISBN?</span>
								<div class="ISBNdiv arrow_box">
									<h3>ISBN</h3>
									<img src="images/ISBN.jpg" />
									<p>This bar-code at the back of a book lets you verify that you're getting exactly the right version or edition of a book. The 13-digit and 10-digit formats both work.</p>
								</div>
							</div>
							<input type="text" name="isbn" class="isbn" title="Enter the ISBN 13 code located on the back of your book cover" placeholder="ISBN" />
							<input type="text" name="nameBook" class="nameBook" title="Enter the name of your reading material" placeholder="Name of Book"/>
							<input type="text" name="price" class="price" placeholder="Your Price in Rs" />
							<input type="text" name="phone" value="<?php echo $phoneno; ?>" class="phone" placeholder="Phone no" />
							<input type="text" name="city" id="pickCity" class="pickCity" readonly placeholder="City" />
							<input readonly type="text" name="nameSeller" value="<?php echo $userName; ?>" class="nameSeller" style="display:none" />
							<!-- Image upload -->
						    <div id="picUploadDiv">
						    	<div class="picHolder">
						    		<img id="uploadPreview" />
						    	</div>
						    	<div class="picUploadRule">
						    		<li>Upload real cover photo of the book (in .jpg, .gif, .png).</li>
						    		<li>Should be less than 5 MB</li>	
							    	<div class="fileUpload btn-upload">
										<span>Upload Image</span>
										<input type="file"  id="uploadImage" class="imgUp" title="Upload the picture here" name="imageBook" onchange="PreviewImage();" />
									</div>
								</div>

								<div class="clear"></div>
						    </div>
							
							<input type="number" name="checkImageUpload" value="0" style="display:none" /> 
						</div>
					</div>
					<div id="form-right">
						<p style="font-weight:bold">This side is optional</p>
						<div class="form-centre">
							<input class="publication" type="text" name="publication" title="" placeholder="Publication" />
							<input class="author" type="text" name="author" placeholder="Author"/>
							<input class="edition" type="text" name="edition" placeholder="Edition"/>
							<input class="originalPrice" type="text" name="originalPrice" title ="MRP of item" placeholder="Original Price(M.R.P.)"/>
							<p class="addNewCategory">Add Category</p>
							<div class="selectedCategoryBox">
								<input id="pickCaty" title="click to remove" class="selectedCatTab go1" value="" type="text" name="cat1" readonly />
								<input id="pickCaty" title="click to remove" class="selectedCatTab go2" value="" type="text" name="cat2" readonly />
								<input id="pickCaty" title="click to remove" class="selectedCatTab go3" value="" type="text" name="cat3" readonly />
								<input id="pickCaty" title="click to remove" class="selectedCatTab go4" value="" type="text" name="cat4" readonly />
								<div class="clear"></div>
							</div>

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

						    <select name="discription" id="discription">
								<option value="unrated">Rate condition of your book</option>
								<option value="Good Condition">Good Condition</option>
								<option value="Fair">Fair</option>
								<option value="Slightly Torn">Slightly Torn</option>
								<option value="Readable">Readable</option>
								<option value="ok..ok..take this at very less price">ok..ok..take this at very less price</option>
							</select>

							<textarea class="review" name="review" placeholder="How do you feel when you read this book"></textarea>

							<p class="rateYourBook">Rate Your Book:</p>
							<button style="display: none;" class=" rating-enable">enable</button>
							<div class="rating-c">		       
					            <select id="example-c" name="rating" title="Be honest in rating ">
					                <option value=""></option>
					                <option value="1">1</option>
					                <option value="2">2</option>
					                <option value="3">3</option>
					                <option value="4">4</option>
					                <option value="5">5</option>
					                <option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
					            </select>
					        </div>
						</div>
					</div>
					<div class="clear"></div>
					
					<div id="finalForm">
						<div class="acceptTerms">
							<p><input type="checkbox" name="terms" class="termsCheckBox" />accept Terms &amp; conditions</p>
						</div>
						<div class="submitHolder">
							<input type="submit" value="Post Your Ad" class="submitAd" />
						</div>
						<div class="clear"></div>
					</div>
				</form>

				
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

		<script type="text/javascript" src="find-book.js"></script>

	</body>
</html>