<?php
// get isbn
$isbn=$_GET['isbn'];
// create url
$url="https://www.googleapis.com/books/v1/volumes?q=isbn:".$isbn."&key=AIzaSyCM-gRup6Lj0cgINCN9rfjvxCMHUmLTe5I&callback=handleResponse";

$book_api = file_get_contents($url);

$book = json_decode($book_api);

$meta_data = $book->items;

?>







