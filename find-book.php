<?php
// get isbn
$isbn=$_POST['isbn'];
// create url
$url='http://isbndb.com/api/books.xml?access_key=RFHUA4IJ&results=details&index1=isbn&value1='.$isbn;
// load url into $response
$response=simplexml_load_file($url);

// check if we got at least one result
if($response->BookList['total_results']>0){
 // we got at least one result
  ?>
  <script type="text/javascript">
    var exists = 1;
  </script>
  <?php
// assign each book to $book
 foreach($response->BookList->BookData as $book)
 {
  
  $title = $book->Title;
  $TitleLong = $book->TitleLong;
  $author = $book->AuthorsText;
  $publisher = $book->PublisherText;
  $isbn10 = $book['isbn'];
  $isbn13 = $book['isbn13'];
  $edition = $book->Details['edition_info'];
  $language = $book->Details['language'];
  $physical = $book->Details['physical_description_text'];
 }
}
else
{
  ?>
  <script type="text/javascript" src="js/jquery-1.11.1.min.js" ></script>
  <script type="text/javascript">
    var exists = 0;
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
    $(document).ready(function(){
      $("#notificationHead").css({background: '#F87217'});;
      $("#notificationHead").slideDown();
      $(".topNotification").text("ISBN not found. Edit fields manually.");
    });
    test1 = 1;

  </script>
  <?php
// echo 'No book was found with ISBN: '.$isbn;
}
?>
  <script type="text/javascript">
    var title = "<?php echo $title; ?>";
    var TitleLong = "<?php echo $TitleLong; ?>";
    var author = "<?php echo $author; ?>";
    var publisher = "<?php echo $publisher; ?>";
    var isbn10 = "<?php echo $isbn10; ?>";
    var isbn13 = "<?php echo $isbn13; ?>";
    var edition = "<?php echo $edition; ?>";
    var language = "<?php echo $language; ?>";
    var physical = "<?php echo $physical; ?>";
  </script>
<?php

?>

