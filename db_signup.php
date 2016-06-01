<?php
	session_start();
	 
    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        //form submitted

        //check if other form details are correct

        //verify captcha
        $recaptcha_secret = "6LcdRgsTAAAAANXzuQ5zWk2GieOhNbzl5gcHOHyd";
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$_POST['g-recaptcha-response']);
        $response = json_decode($response, true);
        if($response["success"] === true)
        {
            if (isset($_POST["name"])&&isset($_POST["email"])&&isset($_POST["password"]))
           { $name=$_POST["name"];
            
			$email=$_POST["email"];
            $pwd=$_POST["password"];
			$activation=md5($email.time()); // encrypted email+timestamp
			
			if(empty($email)||empty($name)||empty($pwd))
			 { echo "Please Enter All Fields";
			   include 'signUp.php';       
			}
			
		else						  
		{		
            include("connectdb.php");
            $count=mysql_query("SELECT uid FROM registered_users WHERE email='$email'",$con);
	 $q1="insert into registered_users(user_name,email,pwd,activation) values('".$name."','".$email."','".$pwd."','".$activation."')";


                if(mysql_num_rows($count) < 1)
				{        
			 			if(mysql_query($q1,$con))
						{   
							$session_id=mysql_insert_id($con);;
							$_SESSION['nID'] = $session_id;

							include 'smtp/Send_Mail.php';
							$to = $email;
							$subject = "Email Verification";

							$body = 'Hi '.$name.'<br /><br />Thanks for registering on BookSiders! You are one step away from exploring the online Books marketplace!<br/><br />
							To complete the registration process, please click on the verification link given below:<br /><br />
							<a href="'.$base_url.'activation/'.$activation.'">'.$base_url.'activation/'.$activation.'</a><br /><br />
							Thank You.';

							Send_Mail($to,$subject,$body);
							

							?> 
                            <script>
								window.location = "profile.php";		
							</script>
							
							
			<?php
								//header("Location: profile.php");
							  
						
						}
				
                            
					}	

					else {
						?>
						<script type="text/javascript">
							window.location = "signUp.php?status=exists";
						</script>
						<?php
					}	
                }
			
		
             }
			else
			{
				?>

				<?php	
			} 
		}
		else{
			?>
			<script type="text/javascript">
				window.location = "signUp.php?status=captcha";
			</script>
			<?php
		}
			
			
																								   
 }
        
        else
        {
?>          
		  <script>alert("you are a robot.......try again if you are not");
							window.location= "signUp.php";
							</script>
<?php							
        }
    	  
			
?>		
