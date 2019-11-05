<?php
function dbConnect ()
{
  return new PDO('mysql:host=localhost;dbname=books', 'root');
}
 ?>

<?php
try{
  $db = new PDO('mysql:host=localhost;dbname=books', 'root', '');
} catch(PDOException $e){
  die('Erreur: '.$e->getMessage());
}
 ?>
