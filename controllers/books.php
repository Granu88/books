<?php
require('models/books.php');

function listBooks()
{
  $booksModel = new Books;
  $books = $booksModel->getBooks();

  require('views/books.php');
}

function showBook ($id)
{
  $non = new Books;
  $book = $non->getBook($id);

  require('views/book.php');
}
