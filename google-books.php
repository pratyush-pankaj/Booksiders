<?php
// get isbn
$isbn=$_POST['isbn'];
// create url
$url="https://www.googleapis.com/books/v1/volumes?q=isbn:".$isbn."&key=AIzaSyCM-gRup6Lj0cgINCN9rfjvxCMHUmLTe5I&callback=handleResponse";

?>

<script src="<?php echo $url; ?>"></script>
<script>
    var item, title, authors, description, bookimg, publisher, pages, rating, edition;
	function handleResponse(response) {
      var totalItems = response.totalItems;
      if(totalItems>0)
      {  
          for (var i = 0; i < response.items.length; i++) {
            item = response.items[i];
            // in production code, item.text should have the HTML entities escaped.
            title = item.volumeInfo.title;
    	    authors = item.volumeInfo.authors;
    	    // description = item.volumeInfo.description;
            if(typeof item.volumeInfo.imageLinks === 'undefined')
            {
                document.forms["sellForm"]["checkImageUpload"].value = "0";
                //image doesnt exist    
                $('#uploadPreview').attr('src', '');
    var bookPreview = document.getElementById("uploadPreview");
    bookPreview.removeAttribute("src");
    var imageFile = document.getElementById("uploadImage");

    imageFile.setAttribute("onchange","PreviewImage()");
    imageFile.setAttribute("type","file");
    $(".fileUpload").show();

     document.forms["sellForm"]["imageBook"].value = "";
            }
            else
            {
                document.forms["sellForm"]["checkImageUpload"].value = "1";
                bookimg = item.volumeInfo.imageLinks.smallThumbnail;
                var bookPreview = document.getElementById("uploadPreview");
            bookPreview.src = bookimg;
            var imageFile = document.getElementById("uploadImage");

            imageFile.removeAttribute("onchange");
            imageFile.setAttribute("type","text");
            $(".fileUpload").hide();

             document.forms["sellForm"]["imageBook"].value = bookimg;
            }
    	    publisher = item.volumeInfo.publisher;
            // pages = item.volumeInfo.pageCount;
            // rating = item.volumeInfo.averageRating;
            edition = item.volumeInfo.publishedDate;
             $('.advanced-p').hide();
            $('#adForm').show();
            document.forms["sellForm"]["nameBook"].value = title;
            document.forms["sellForm"]["nameBook"].focus();
            document.forms["sellForm"]["nameBook"].blur();
            document.forms["sellForm"]["nameBook"].readOnly = true;
            $(".nameBook").addClass("uneditable");
            document.forms["sellForm"]["publication"].value = publisher;
            document.forms["sellForm"]["publication"].focus();
            document.forms["sellForm"]["publication"].blur();
            document.forms["sellForm"]["publication"].readOnly = true;
            $(".publication").addClass("uneditable");
            document.forms["sellForm"]["author"].value = authors;
            document.forms["sellForm"]["author"].focus();
            document.forms["sellForm"]["author"].blur();
            document.forms["sellForm"]["author"].readOnly = true;
            $(".author").addClass("uneditable");
            document.forms["sellForm"]["edition"].value = edition;
            document.forms["sellForm"]["edition"].focus();
            document.forms["sellForm"]["edition"].blur();
            document.forms["sellForm"]["edition"].readOnly = true;
            $(".edition").addClass("uneditable");
            
            

            // document.forms["sellForm"]["originalPrice"].focus();

            $("#notificationHead").css({background: '#F87217'});;
            $("#notificationHead").slideDown();
            $(".topNotification").text("ISBN auto-fetch completed. Few Fields are now uneditable.");
           
           
            // $(this).css({background: '#ecf0f1', color: '#444', borderColor: '#E5E4E2'});
            // document.forms["sellForm"]["nameBook"].style.background = "#ecf0f1"; 
            
            
          }
      }
        else
        {
            document.forms["sellForm"]["nameBook"].value = "";
    document.forms["sellForm"]["nameBook"].readOnly = false;
    document.forms["sellForm"]["publication"].value = "";
    document.forms["sellForm"]["publication"].readOnly = false;
    document.forms["sellForm"]["author"].value = "";
    document.forms["sellForm"]["author"].readOnly = false;
    document.forms["sellForm"]["edition"].value = "";
    document.forms["sellForm"]["edition"].readOnly = false;
    document.forms["sellForm"]["nameBook"].focus();
    // document.forms["sellForm"]["nameBook"].blur();
    // document.forms["sellForm"]["originalPrice"].focus();
    $("#notificationHead").css({background: '#E41B17'});;
    $("#notificationHead").slideDown();
    $(".topNotification").text("ISBN not found. Edit fields manually.");
    $('#uploadPreview').attr('src', '');
    var bookPreview = document.getElementById("uploadPreview");
    bookPreview.removeAttribute("src");
    var imageFile = document.getElementById("uploadImage");

    imageFile.setAttribute("onchange","PreviewImage()");
    imageFile.setAttribute("type","file");
    $(".fileUpload").show();

     document.forms["sellForm"]["imageBook"].value = "";
    test1 = 1;
        }          
    }

</script>



<?php
?>