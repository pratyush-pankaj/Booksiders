<?php

$email=$_POST["newsEmail"];
include("connectdb.php"); 


?>


<!doctype html>
<html lang="en">
	<head>
		<link rel="shortcut icon" href="favicon.png" />
		<title>Pyrobook</title>

		<!-- SEO GOES HERE. META AND ALL -->

		<meta name="viewport" content="width=device-width" />

		<!-- CSS LINKED HERE -->

		<link rel="stylesheet" type="text/css" href="css/header.css" />
		<link rel="stylesheet" type="text/css" href="css/fonts.css" />
		<link rel="stylesheet" type="text/css" href="css/footer.css" />
		<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen and (max-width: 650px)" />

		<!-- JAVASCRIPT LINKED HERE -->
	<script type="text/javascript" src="js/jquery-1.11.1.min.js" ></script>
	<script type="text/javascript" src="js/main.js" ></script>
	<script type="text/javascript"> </script>
	
	</head>

	<body class='signUpBody'>

		<!-- Sign Up Division -->
		<div id="signUpDiv">
			<div class="centre">
				<div id="signUpBox">
					<div class="signLogoDiv"><a href="#" class="logoUp" title="Home">Pyrobook</a></div>  
					
					<form id="signUpForm" class="signUpForm" action="db_signup.php" method="POST" >
						<p>Name:</p>
						<input type="text" class="nameUser" name="name" placeholder="Isaac Newton" />
						<p>Email:</p>
						<input type="email" name="email" placeholder="sir.newton@example.com" value="<?php echo $email?>"/>
						<p>Password:</p>
						<input type="password" name="password" placeholder="8 Character Min" />
						
						<input type="submit" value="Dive In!" class="basicButton" />

					</form>

					<form id="signUpForm" class="signInForm" action="login_auth.php" method="POST" >
						<p>Email:</p>
						<input type="email" name="email" placeholder="sir.newton@example.com" value="<?php echo $email?>"/>
						<p>Password:</p>
						<input type="password" name="password" placeholder="Password" />
						
						<input type="submit" value="Fire Up!" class="basicButton" />
					</form>

					<div id="lastLineSignUp">
						<a href="" class="switchSign">Already a member?</a>
						<a href="">Lost password?</a>
					</div>
				</div>
			</div>
		</div>


		
	</body>
</html>