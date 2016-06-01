$(document).ready(function(){
    // Signup Division Things
    // var sign = 0;   // 0: Sign Up | 1: Sign In

    //switch between sign in and sign up
    $(".gotit").click(function(){
        $("#helpTop").hide();
    });

    (function(){
        var sign = 0;

        $('.switchSign').click(function(){

            if(sign == 0)
            {
                $('.signUpForm').hide();
                $('.signInForm').fadeIn();
                $(this).text("Join Pyrobook");
                sign = 1;
            }

            else if(sign == 1)
            {
                $('.signUpForm').fadeIn();
                $('.signInForm').hide();
                $(this).text("Already a member");
                sign = 0;
            }

            return false;

        });

    })();
    
    //open Sign up Box on clicking the class openSignUpBox 

    //window.signBoxStatus=0    //0 = not opened and 1 = opened

    $('.openSignUpBox').click(function(){

        window.signBoxStatus = 1;
        window.removeEventListener( 'keyup', insertKey );
        $("#virtual").addClass("virtual");
        $(".virtual").show();    
        $("body").css("overflow", "hidden");
        $(".virtual").load("signUp.php#signUpDiv");
        window.sign = 0;

    });

    //open Sign In Box when click account ka sign in

    $('.openSignInBox').click(function(){

        window.signBoxStatus = 1;
        window.removeEventListener( 'keyup', insertKey );
        $("#virtual").addClass("virtual");
        $(".virtual").show();    
        $("body").css("overflow", "hidden");
        $(".virtual").load("signUp.php#signUpDiv");
        window.sign = 1;
        return false;

    });

    $("#signUpBox").ready(function(){
        
        if( window.sign == 0 )
        {
            $('.signUpForm').fadeIn();
            $('.signInForm').hide();
            // $(this).text("Already a member");
            sign = 0;
        }
        else if( window.sign == 1 )
        {
            $('.signUpForm').hide();
            $('.signInForm').fadeIn();
            // $(this).text("Join Pyrobook");
            sign = 1;
        }

    });

    //putting value of name in name field of sign up
    $("#signUpForm").ready(function(){
        var val_of_name = document.forms["sellForm"]["nameSeller"].value;
        document.forms["signUpForm"]["name"].value = val_of_name;
        var check = document.forms["signUpForm"]["name"].value;
        if( check == "" || check == null)
            document.forms["signUpForm"]["name"].focus();    
        else
            document.forms["signUpForm"]["email"].focus();
    });   
	
	//putting value of email of newsletter in email field of signup
    $("#signUpForm").ready(function(){
        var val_of_email = document.forms["newsForm"]["newsEmail"].value;
        document.forms["signUpForm"]["email"].value = val_of_email;
        var check = document.forms["signUpForm"]["email"].value;
        if( check == "" || check == null)
            document.forms["signUpForm"]["email"].focus();    
        else
            document.forms["signUpForm"]["name"].focus();
    });   


    
	$('.myAccount').click(function(){
        
		//$('.myAccount ul').fadeToggle();
        //$('.myAccount ul').show();
        $('.myAccount ul').animate({
            opacity: "toggle",
            top: "toggle",
            height: "toggle"

        },400);

	});

    $(".wishList").hover(function(){
        $(".wishBox").toggle();
    });

	$('.menuDrop').click(function(){
		$('#navDrop').slideToggle();
	});

	$('.headSearch').click(function(){
		$('#searchBar').fadeToggle();
	});

	$('#display ul li:last-child').click(function(){
		$('#searchBar').fadeIn();
	});

    $('.catsMore').click(function(){
        $('#categoryBox').fadeIn();
    });

    $('.catBoxHead span').click(function(){
        $('#categoryBox').fadeOut();
    });

    $('.search').focus(function(){
        $('#searchBar').css({background: 'rgba(167, 74, 199,1)'})
    });

    $('.search').blur(function(){
        $('#searchBar').css({background: 'rgba(167, 74, 199,0.8)'})
    });



    //Open more cities Panel when clicked more cities
     $('.moreCity').click(function(){
        $('#extraCity').css({right: '0px'});
     });

     $('.moreCity a').click(function(){
        $('#extraCity').css({right: '0px'});
        return false;
     });

    
	//Event Listening for opening search bar when any character is pressed.

	var listen = /^[a-z0-9]+$/i;
    var searchInput = document.getElementById('searchInput');
    var searchBar = document.getElementById('searchBar');

    $('#searchInput').focus(function(){
        window.removeEventListener( 'keyup', insertKey );
    });

    if ( window.addEventListener )
        window.addEventListener( 'keyup', insertKey, false);

    function insertKey( e ) {
        // Get the character from e.keyCode
        var key = String.fromCharCode( e.keyCode ).toLowerCase(); 

        //var key = String.fromCharCode( e.keyCode ); 

        // Match the character
        if( key.match(listen) ) {

            // Change display: none; to display: block;
            //searchBar.style.display = "block";

            if(stopSearch=="")
            {
                $('#searchBar').fadeIn();
                // Focus on input
                searchInput.focus();
                // Append every new character
                searchInput.value += key;
            }
            


            // Since you focused on the input you don't need to listen for keyup anymore.
            window.removeEventListener( 'keyup', insertKey );

            // I didn't tested with jQuery
            // $('#searchBar').fadeIn();
            // $('#searchBar input').append(keys);
            // $('#searchBar input').focus();
        }
    }

    //Making the header normal.
     setInterval(function(){
     	$('#header').css({background: 'rgba(255,255,255,1)'});
     },500);



     
     //Dashboard JavaScript

     $(".notify").click(function(){
        $("#dashboxRight").load("dashboard/notification.php #notificationBox");
     });

     $(".yourAds").click(function(){
        $("#dashboxRight").load("dashboard/ads.php #notificationBox");
     });

     $(".yourSettings").click(function(){
        $("#dashboxRight").load("dashboard/settings.php #notificationBox");
     });

     $(".profilePic").click(function(){
        $("#dashboxRight").load("dashboard/profile.php #notificationBox");
        // $('#dashboxRight #notificationBox').addClass('profileDiv');
     });

     $(".yourShop").click(function(){
        $("#dashboxRight").load("dashboard/shop.php #notificationBox");
     });

     $(".dashTabs li").click(function(){
        $(".dashTabs li.active").removeClass("active");
        $(this).addClass("active");
     });


     $(".catBoxHead").html("<span>x</span>");

     $("#header #menu a:first-child").click(function(){
            $("#categoryBox").slideToggle();
            return false;
        });    
     //Dashboard JavaScript Ends
     
     //search Page


     //Closing Everything when blured

     $(document).click(function(e){
		if( e.target.className != 'myAccount' && !$('.myAccount').find(e.target).length && e.target.className != 'accountNav' && !$('.accountNav').find(e.target).length)
		{
			$('.myAccount ul').hide();
		}

		if( e.target.className != 'headSearch' && !$('.headSearch').find(e.target).length && e.target.id != 'searchBar' && !$('#searchBar').find(e.target).length && e.target.className != 'li-search-button' && !$('.li-search-button').find(e.target).length)
		{
			$('#searchBar').fadeOut();
            $("#suggestBox").fadeOut();
            if( window.signBoxStatus != 1 ) {
    			if ( window.addEventListener )
             		window.addEventListener( 'keyup', insertKey, false);
            }
		}

		if( e.target.className != 'moreCity' && !$('.moreCity').find(e.target).length && e.target.id != 'extraCity' && !$('#extraCity').find(e.target).length && e.target.className != 'pickCity' && !$('.pickCity').find(e.target).length)
		{
			$('#extraCity').css({right: '-25%'});
		}

        if( e.target.className != 'catsMore' && !$('.catsMore').find(e.target).length && e.target.id != 'categoryBox' && !$('#categoryBox').find(e.target).length && e.target.className != 'pickCategory' && !$('.pickCategory').find(e.target).length)
        {
            $('#categoryBox').fadeOut();
        }

	});

    

    //stopping auto searching when focusing on a field

    $('input').keydown(function(){
        window.removeEventListener( 'keyup', insertKey );
    });


     //Closing Everything with the press of ESC
if (window.addEventListener) {
    var kkk = [],
   		konami = "27";

    window.addEventListener("keyup", function(e){

        kkk.push(e.keyCode);       
        
        if (kkk.toString().indexOf(konami) >= 0) {
            
            window.addEventListener( 'keyup', insertKey, false);
            
            $(".virtual").load();
            $(".virtual").hide();
            $("#virtual").removeClass("virtual");
            $("#virtual").html("");
            $("body").css({overflow: "auto"});

            $('.myAccount ul').slideUp();
        	
            $("#suggestBox").fadeOut();
        	$('#searchBar').fadeOut();
            
        	$('#extraCity').css({right: '-25%'});
            $('#categoryBox').fadeOut();

            kkk = [];

        };
    }, true);
};


        $(".closeNotification").click(function(){
            $("#notificationHead").slideUp();
        });

    

        //Picking up city in the sell form and category
        
        $('.pickCity').click(function(){
            $('#extraCity').css({right: '0px'});
        });

        $('.pickCategory').click(function(){
            $('#categoryBox').fadeIn();
        });


        if(city=='city')
        {
            $('.allCity').click(function(){
                var name_of_city = $(this).text();
                document.getElementById("pickCity").value=name_of_city;
                selectedCity = name_of_city;
                $("#pickCity").blur();
                $('#extraCity').css({right: '-25%'});
                return false;   
            });

            $('.allCategory').click(function(){
                var name_of_category = $(this).text();
                document.getElementById("pickCategory").value=name_of_category;
                $('#pickCategory').blur();
                $('#categoryBox').fadeOut();
                return false;
            });
            
        }

        

        //Opening Advanced Form

        $('#advanced').click(function(){
            window.signBoxStatus = 1;
            window.removeEventListener( 'keyup', insertKey );
        });

        $('.advanceFormButton').click(function(){
            $('.advanced-p').hide();
            $('#adForm').fadeIn();
            return false;
        });

        //disable link of sign up to open the box
        $('.signUpA').click(function(){
            
            return false;
        });
        

});

$(document).scroll(function(){

	//Making the Header Transparent when scrolling.
	$('#header').css({background: 'rgba(255,255,255,0.9)'});

});


//opening city when city is passed in search
     function validateSearch(){
     	var search = document.forms["searchForm"]["searchInput"].value;
     	search = search.toLowerCase();
     	if(search == 'city')
     	{
     		$('#searchBar').fadeOut();
     		$('#extraCity').css({right: '0px'});
            document.forms["searchForm"]["searchInput"].value="";
     		return false;
     	}

        else if(search == 'category')
        {
            $('#searchBar').fadeOut();
            $('#categoryBox').fadeIn();
            document.forms["searchForm"]["searchInput"].value="";
            return false;
        }
     }

//City Suggestion AJAX Here

/*
function searchHint(str)
{
    var xht = new XMLHttpRequest();
    if(str.length==0)
    {
        document.getElementById("citySuggest").innerHTML="";
        $("#suggestBox").fadeOut();
        return;
    }

    xht.onreadystatechange = function(){

        if(xht.readyState==4 && xht.status == 200)
        {
            var res=xht.responseText;
            if(res==""|res==null)
                $("#suggestBox").fadeOut();
            else
            {
                 $('#suggestBox').fadeIn();
                document.getElementById("citySuggest").innerHTML=xht.responseText;
            }
        }

    }

    xht.open("GET", "hints/cityhint.php?q="+str, true);
    xht.send();

}

*/     

//Preview the image that is to be uploaded
function PreviewImage() 
{
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
        $('.validPic').html("<img src='images/right.png' width='30' height='30' title='Validated' />");
        $('.validPic').fadeIn();

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
};




