<?php
$action = (string) $_GET['action'];

switch ($action) {
  case 'books':
    require('controllers/books.php');
    listBooks();
    break;
  case 'book':
    if(isset($_GET['id'])) {
      require_once('controllers/books.php');
      showBook($_GET['id']);
      break;
    }
  default:
    require('views/404.php');
}
