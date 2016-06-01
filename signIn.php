<?php include("connectdb.php"); 

	session_start();
	if(isset($_SESSION['nID']))
	{
		?>
		<script type="text/javascript">
		window.location = "index.php";
		</script>
		<?php
	}

	$status = $_GET["status"];
	
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

		<link rel="stylesheet" type="text/css" href="css/login.css" />
		<link rel="stylesheet" type="text/css" href="css/header.css" />
		<link rel="stylesheet" type="text/css" href="css/fonts.css" />
		<link rel="stylesheet" type="text/css" href="css/footer.css" />
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:500px)" href="css/small_style.css" />


		<!-- JAVASCRIPT LINKED HERE -->
	<script type="text/javascript" src="js/jquery-1.11.1.min.js" ></script>
	<script type="text/javascript" src="js/main.js" ></script>
	
	</head>

	<body class='signUpBody InBody'>

			<!-- facebook API Starts -->

	<script>

	// This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      console.log(response.authResponse.accessToken);
      statusChangeCallback(response);
    });
  }

function facebook_login()
{
  FB.login(function(response) {
   if (response.status === 'connected') {
    // Logged into your app and Facebook.
    console.log(response.authResponse.accessToken);
    testAPI(); 
  } else if (response.status === 'not_authorized') {
    // The person is logged into Facebook, but not your app.
  } else {
    // The person is not logged into Facebook, so we're not sure if
    // they are logged into this app or not.
  }
 }, {scope: 'email,public_profile'});

}

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '493394594154043',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.4' // use version 2.2
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me?fields=id,name,email', function(response) {

      var name = response.name;
      var email = response.email;
      var fid = response.id;
      window.location = "facebook_signup.php?name="+name+"&email="+email+"&fid="+fid;
    });
  }
</script>

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->


		<!-- facebook API ends -->

		<script type="text/javascript">

		function forget()
		{
			var email = document.forms["loginForm"]["email"].value;
			if(email=="")
			{
				alert("Enter your Email Id and then click forget Password.");
			}
			else{
				window.location = "forgetPassword.php?email="+email;
			}
		}

		</script>

		<?php

		if($status == "wrong")
		{
		?>
			<div id="messageBox">
				<p>Something went wrong. Email Id or Password doesnt exist.</p>
			</div>
		<?php
		}

		if($status == "active")
		{
		?>
			<div id="messageBox">
				<p>Voilà! Your Account is now active.</p>
			</div>
		<?php
		}

		if($status == "email")
		{
		?>
			<div id="messageBox">
				<p>Oops! This email Id doesnt exist. Please try again.</p>
			</div>
		<?php
		}

		if($status == "password")
		{
		?>
			<div id="messageBox">
				<p>Your Password has been sent at your email ID.</p>
			</div>
		<?php
		}

		?>

		<div id="loginBox">
			<h1>Login into BookSiders</h1>

			<form id="loginForm" action="login_auth.php" name="loginForm" method="POST">
				<input required type="email" class="loginInput" name="email" placeholder="Email Id" value="" />
				<input required type="password" class="loginInput" name="password" placeholder="Password" value="" />

				<p class="forgetPassword" onclick="forget();">Forget Password?</p>

				<input type="submit" value="Dive In!" class= "loginButton" />
				
			</form>


				<button class="loginButton facebookButton" onclick="facebook_login();">Login via Facebook</button>

				<p class="newTo">New to BookSiders? <a href="signUp.php">Register Here.</a></p>
			
		</div>

	</body>
</html>