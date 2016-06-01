$(document).ready(function(){
    // Signup Division Things
    // var sign = 0;   // 0: Sign Up | 1: Sign In

    //sellForm category entry    


    //TIPS
    var tips = [
        "Start typing your book's name without clicking on search button",
        "Share your location to know the distance from seller's location",
        "Enter ISBN code to auto-fetch the sell form fields",
        "Click your name on the taskbar to edit/delete your ads",
        "You can goto your dashboard to edit your settings"    
    ];

    
    $("#tips p span").text(tips[0]);
    var i=1;
    setInterval(function(){
       $("#tips p span").text(tips[i]);
       i++;
       if(i==5)
        i=0;
    },8000);
    
    



    //switch between sign in and sign up
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
        $('#categoryBox').slideUp();
    });

    $('.catBoxHead span').click(function(){
        $('#categoryBox').slideUp();
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
            $('#searchBar').fadeIn();
            // Focus on input
            searchInput.focus();
            // Append every new character
            searchInput.value += key;
            

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
        $("#dashboxRight").load("dashboard.php #notificationBox");
        $('#dashboxRight #notificationBox').show();
     });

     $(".profilePic").click(function(){
        $("#dashboxRight").load("dashboard/profile.php #notificationBox");
     });

     $(".yourShop").click(function(){
        $("#dashboxRight").load("dashboard/shop.php #notificationBox");
     });

     $(".dashTabs li").click(function(){
        $(".dashTabs li.active").removeClass("active");
        $(this).addClass("active");
     });

     $(".facebook").click(function(){
        window.open('https://www.facebook.com/booksiders', '_blank');
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
			$('#extraCity').css({right: '-300px'});
		}

        if( e.target.className != 'catsMore' && !$('.catsMore').find(e.target).length && e.target.id != 'categoryBox' && !$('#categoryBox').find(e.target).length && e.target.className != 'pickCategory' && !$('.pickCategory').find(e.target).length)
        {
            $('#categoryBox').slideUp();
        }

	});

    $('.aboutISBN span').hover(function(){
        $('.ISBNdiv').fadeToggle();
    });    

    //stopping auto searching when focusing on a field

    $('input').keydown(function(){
        window.removeEventListener( 'keyup', insertKey );
    });

    $('textarea').keydown(function(){
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
            
        	$('#extraCity').css({right: '-300px'});
            $('#categoryBox').slideUp();

            kkk = [];

        };
    }, true);
};

        $(".closeNotification").click(function(){
            $("#notificationHead").slideUp();
        });


        $(".catBoxHead").html("<span>x</span>");
    
        $("#header #menu a:first-child").click(function(){
            $("#categoryBox").slideToggle();
            return false;
        });    
    

        //Picking up city in the sell form and category
        
        $('.pickCity').click(function(){
            $('#extraCity').css({right: '0px'});
        });

        $('.pickCategory').click(function(){
            $('#categoryBox').slideDown();
        });


        if(city=='city')
        {
            $('.allCity').click(function(){
                var name_of_city = $(this).text();
                document.getElementById("pickCity").value=name_of_city;
                selectedCity = name_of_city;
                $("#pickCity").blur();
                $('#extraCity').css({right: '-300px'});
                return false;   
            });

            $('.allCategory').click(function(){
                var name_of_category = $(this).text();
                document.getElementById("pickCategory").value=name_of_category;
                $('#pickCategory').blur();
                $('#categoryBox').fadeOut();
                return false;
            });

            $('.allCategory2').click(function(){
                i++;
                var name_of_category = $(this).text();
                
                $('#categoryBox').slideUp();

                var go1 = $(".go1").val();
                var go2 = $(".go2").val();
                var go3 = $(".go3").val();
                var go4 = $(".go4").val();

                if(go1 == "" || go1 == null)
                {                
                    $(".go1").val(name_of_category);
                    $(".go1").fadeIn();
                }

                else if(go2 == "" || go2 == null)
                {
                    $(".go2").val(name_of_category);
                    $(".go2").fadeIn();
                }

                else if(go3 == "" || go3 == null)
                {
                    $(".go3").val(name_of_category);
                    $(".go3").fadeIn();
                }

                else if(go4 == "" || go4 == null)
                {
                    $(".go4").val(name_of_category);
                    $(".go4").fadeIn();
                }                
                // if(i==2)
                // {
                //     $(".go1").val(name_of_category);
                //     $(".go1").fadeIn();
                // }
                // else if(i==3)
                // {
                //     $(".go2").val(name_of_category);
                //     $(".go2").fadeIn();
                // }
                // else if(i==4)
                // {
                //     $(".go3").val(name_of_category);
                //     $(".go3").fadeIn();
                // }
                // else if(i==5)
                // {
                //     $(".go4").val(name_of_category);
                //     $(".go4").fadeIn();
                // }
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
            $('#categoryBox').slideDown();
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

// //Ajax form submit of sell form
// $("#sellForm").submit(function() {
//     alert("going");
//     var url = "sell_form_entry.php"; // the script where you handle the form input.

//     $.ajax({
//            type: "POST",
//            url: url,
//            data: $("#sellForm").serialize(), // serializes the form's elements.
//            success: function(data)
//            {
//                alert("done"); // show response from the php script.
//            }
//          });

//     return false; // avoid to execute the actual submit of the form.
// });



