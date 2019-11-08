<?php
session_start();
if (!isset($_SESSION['id'])){
  header('Location: ./');
}
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <div>
       Id : <?php echo $_SESSION['id']; ?>
     </div>
     <div>
       Nom : <?php echo $_SESSION['name']; ?>
     </div>
   </body>
 </html>
