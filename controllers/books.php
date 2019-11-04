<?php
require('models/books.php');

function listBooks()
{
  $books = getbooks();

  require('views/books.php');
}

function showBook ($id)
{
  $book = getBook($id);

  require('views/book.php');
}
