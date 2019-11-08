<?php
include('is-log.php')
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
