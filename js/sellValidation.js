//javascript file for validation of sell form

$(document).ready(function(){
	$('#example-c').barrating('show', {
        showValues:true,
        showSelectedRating:false
    });


	$(".addNewCategory").click(function(){
        var catCategory="category";
        if(i<=4)
        {
            $("#categoryBox").slideToggle();
            var addcatNo=1;
        }
        else{
            
        }
        return false;
    });

    $(".selectedCatTab").click(function(){

        $(this).fadeOut();
        $(this).val("");
        i--;

    });

	$(".isbn").blur(function(){
		isbn=$(".isbn").val();
		// send isbn value as POST variable "isbn" and load result in bookinfo div
		if(isbn != "" && isbn != null)
		{			
	    $("#bookInfo").load("google-books.php",{isbn:isbn},function(){});
		}

		var val = document.forms["sellForm"]["isbn"].value;
		if(val == "" || val == null)
			$(this).css({background: '#FAFAFA', color: '#333', borderColor: '#E5E4E2'});
		else
			$(this).css({background: '#A74AC7', color: '#fff', borderColor: '#A74AC7'});
	});


	$('.nameBook').blur(function(){

		var val = document.forms["sellForm"]["nameBook"].value;
		
		
		if(val.length<=5)
		{
			$(this).css({background: '#FAFAFA', color: '#333', borderColor: '#E5E4E2'});
			$('.validName').html("<img src='images/wrong.png' width='30' height='30' title='Title should be of atleast 5 characters' />");
			$('.validName').fadeIn();
			test1=1;
		}
		else
		{
			$(this).css({background: '#A74AC7', color: '#fff', borderColor: '#A74AC7'});
			$('.validName').html("<img src='images/right.png' width='30' height='30' title='Validated' />");
			$('.validName').fadeIn();
			test1=0;
		}
	});


	$('.price').blur(function(){
		var num = /^[0-9]+$/;
		var val = document.forms["sellForm"]["price"].value;
		if(!val.match(num))
		{
			$(this).css({background: '#FAFAFA', color: '#333', borderColor: '#E5E4E2'});
			$('.validPrice').html("<img src='images/wrong.png' width='30' height='30' title='This can be only in numbers(Rupees)' />");
			$('.validPrice').fadeIn();
			test2=1;
		}
		else
		{
			$(this).css({background: '#A74AC7', color: '#fff', borderColor: '#A74AC7'});
			$('.validPrice').html("<img src='images/right.png' width='30' height='30' title='Validated' />");
			$('.validPrice').fadeIn();
			test2=0;
		}
	});


	$('.nameSeller').blur(function(){
		var val = document.forms["sellForm"]["nameSeller"].value;
		if(val.length<=3)
		{
			$(this).css({background: '#FAFAFA', color: '#333', borderColor: '#E5E4E2'});
			$('.validUser').html("<img src='images/wrong.png' width='30' height='30' title='Should be of atleast 3 characters' />");
			$('.validUser').fadeIn();
			test3=1;
		}
		else
		{
			$(this).css({background: '#A74AC7', color: '#fff', borderColor: '#A74AC7'});
			$('.validUser').html("<img src='images/right.png' width='30' height='30' title='Validated' />");
			$('.validUser').fadeIn();
			test3=0;
		}
	});

	$('.phone').blur(function(){
		var phoneno = /^\d{10}$/;
		var val = document.forms["sellForm"]["phone"].value;
		if(!val.match(phoneno))
		{
			$(this).css({background: '#FAFAFA', color: '#333', borderColor: '#E5E4E2'});
			$('.validPhone').html("<img src='images/wrong.png' width='30' height='30' title='10 Digit phone number' />");
			$('.validPhone').fadeIn();
			test4=1;
		}
		else
		{
			$(this).css({background: '#A74AC7', color: '#fff', borderColor: '#A74AC7'});
			$('.validPhone').html("<img src='images/right.png' width='30' height='30' title='Validated' />");
			$('.validPhone').fadeIn();
			test4=0;
		}
	});

	$('.pickCity').blur(function(){
            var val = document.forms["sellForm"]["city"].value;
            if(val != selectedCity)
            {
                $(this).css({background: '#FAFAFA', color: '#333', borderColor: '#E5E4E2'});
                $('.validCity').html("<img src='images/wrong.png' width='30' height='30' title='Select city from the list' />");
                $('.validCity').fadeIn();
                test5=1;
            }
            else
            {
                $(this).css({background: '#A74AC7', color: '#fff', borderColor: '#A74AC7'});
                $('.validCity').html("<img src='images/right.png' width='30' height='30' title='Validated' />");
                $('.validCity').fadeIn();
                test5=0;
            }
        });


	//Auto Validation Here

	var name_of_item = document.forms["sellForm"]["nameBook"].value;
	var price_of_item = document.forms["sellForm"]["price"].value;
	var name_of_user = document.forms["sellForm"]["nameSeller"].value;
	var phone_no = document.forms["sellForm"]["phone"].value;
	var city_of_user = document.forms["sellForm"]["city"].value;

	if(name_of_user != '' || name_of_user != null)
	{
		var val = document.forms["sellForm"]["nameBook"].value;
		if(val.length<=5)
		{
			$('.nameBook').css({background: '#FAFAFA', color: '#333', borderColor: '#E5E4E2'});
			$('.validName').html("<img src='images/wrong.png' width='30' height='30' title='Title should be of atleast 5 characters' />");
			$('.validName').fadeIn();
		}
		else
		{
			$('.nameBook').css({background: '#A74AC7', color: '#fff', borderColor: '#A74AC7'});
			$('.validName').html("<img src='images/right.png' width='30' height='30' title='Validated' />");
			$('.validName').fadeIn();
		}
	}


	if(price_of_item != '' || price_of_item != null)
	{
		var num = /^[0-9]+$/;
		var val = document.forms["sellForm"]["price"].value;
		if(!val.match(num))
		{
			$('.price').css({background: '#FAFAFA', color: '#333', borderColor: '#E5E4E2'});
			$('.validPrice').html("<img src='images/wrong.png' width='30' height='30' title='This can be only in numbers(Rupees)' />");
			$('.validPrice').fadeIn();
		}
		else
		{
			$('.price').css({background: '#A74AC7', color: '#fff', borderColor: '#A74AC7'});
			$('.validPrice').html("<img src='images/right.png' width='30' height='30' title='Validated' />");
			$('.validPrice').fadeIn();
		}
	}

	if(name_of_user != '' || name_of_user != null)
	{
		var val = document.forms["sellForm"]["nameSeller"].value;
		if(val.length<=3)
		{
			$('.nameSeller').css({background: '#FAFAFA', color: '#333', borderColor: '#E5E4E2'});
			$('.validUser').html("<img src='images/wrong.png' width='30' height='30' title='Should be of atleast 3 characters' />");
			$('.validUser').fadeIn();
		}
		else
		{
			$('.nameSeller').css({background: '#A74AC7', color: '#fff', borderColor: '#A74AC7'});
			$('.validUser').html("<img src='images/right.png' width='30' height='30' title='Validated' />");
			$('.validUser').fadeIn();
		}
	}

	if(phone_no != '' || phone_no != null)
	{
		var phoneno = /^\d{10}$/;
		var val = document.forms["sellForm"]["phone"].value;
		if(!val.match(phoneno))
		{
			$('.phone').css({background: '#FAFAFA', color: '#333', borderColor: '#E5E4E2'});
			$('.validPhone').html("<img src='images/wrong.png' width='30' height='30' title='10 Digit phone number' />");
			$('.validPhone').fadeIn();
		}
		else
		{
			$('.phone').css({background: '#A74AC7', color: '#fff', borderColor: '#A74AC7'});
			$('.validPhone').html("<img src='images/right.png' width='30' height='30' title='Validated' />");
			$('.validPhone').fadeIn();
		}
	}


	if(name_of_item == '' || name_of_item == null)
		$('.validName').hide();

	if(price_of_item == '' || price_of_item == null)
		$('.validPrice').hide();

	if(name_of_user == '' || name_of_user == null)
		$('.validUser').hide();

	if(phone_no == '' || phone_no == null)
		$('.validPhone').hide();

	

	// $("input").click(function(){
	// 	alert("get");
	// 	$(".topNotification").text("This field is uneditable due to auto-fetch feature of ISBN. Change ISBN to edit the field.");
	// });
	

	$("#pac-input").blur(function(){
		var val = document.forms["sellForm"]["landmark"].value;
		if(val == "" || val == null)
			$(this).css({background: '#FAFAFA', color: '#333', borderColor: '#E5E4E2'});
		else
			$(this).css({background: '#A74AC7', color: '#fff', borderColor: '#A74AC7'});
	});


	$(".publication").blur(function(){
		var val = document.forms["sellForm"]["publication"].value;
		if(val == "" || val == null)
			$(this).css({background: '#FAFAFA', color: '#333', borderColor: '#E5E4E2'});
		else
			$(this).css({background: '#A74AC7', color: '#fff', borderColor: '#A74AC7'});
	});

	$(".author").blur(function(){
		var val = document.forms["sellForm"]["author"].value;
		if(val == "" || val == null)
			$(this).css({background: '#FAFAFA', color: '#333', borderColor: '#E5E4E2'});
		else
			$(this).css({background: '#A74AC7', color: '#fff', borderColor: '#A74AC7'});
	});

	$(".edition").blur(function(){
		var val = document.forms["sellForm"]["edition"].value;
		if(val == "" || val == null)
			$(this).css({background: '#FAFAFA', color: '#333', borderColor: '#E5E4E2'});
		else
			$(this).css({background: '#A74AC7', color: '#fff', borderColor: '#A74AC7'});
	});

	$(".originalPrice").blur(function(){
		var val = document.forms["sellForm"]["originalPrice"].value;
		if(val == "" || val == null)
			$(this).css({background: '#FAFAFA', color: '#333', borderColor: '#E5E4E2'});
		else
			$(this).css({background: '#A74AC7', color: '#fff', borderColor: '#A74AC7'});
	});

	$(".discription").blur(function(){
		var val = document.forms["sellForm"]["discription"].value;
		if(val == "" || val == null)
			$(this).css({background: '#FAFAFA', color: '#333', borderColor: '#E5E4E2'});
		else
			$(this).css({background: '#A74AC7', color: '#fff', borderColor: '#A74AC7'});
	});
	$(".review").blur(function(){
		var val = document.forms["sellForm"]["review"].value;
		if(val == "" || val == null)
			$(this).css({background: '#FAFAFA', color: '#333', borderColor: '#E5E4E2'});
		else
			$(this).css({background: '#A74AC7', color: '#fff', borderColor: '#A74AC7'});
	});

});


$(document).ready(function(){

	$(".alertClose").click(function(){
		$("#outerAlert").fadeOut();
		return false;
	});


	
});
