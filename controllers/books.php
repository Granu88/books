<?php
require('models/books.php');

function listBooks()
{
  $books = getbooks();
  
  require('views/books.php');
}
