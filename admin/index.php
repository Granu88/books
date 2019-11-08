<?php
  require('../utils/db.php');// je vais chercher la base de donnée (php my admin)

  $db = dbConnect(); //je me connecte à la BDD

  session_start();// demarage session php

  if (isset($_SESSION['id'])) {
    session_destroy(); //si il a une session en cours on la déconnecte
  }

  if (isset($_POST['login'])){ //on vérifie si on a posté un formulaire
    $login = (string) $_POST['login'];
    $password = (string) $_POST['pwd'];

  if (filter_var($login, FILTER_VALIDATE_EMAIL) && $password) {
    //$password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $db->prepare('SELECT * FROM users WHERE email = :logs');
    $stmt->bindParam(':logs', $login, PDO::PARAM_STR);
    $stmt->execute();//j'éxecute ma requête
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) { //on vérifie l'email e le pwd
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        header('Location: ./profile.php'); //redirection après login vers notre page de profile
    }
  }
}


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Session</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1 class="mt-3 mb-3"> Se connecter </h1>
      <form action="./" method="post" >
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="email">Email address:</label>
              <input required name="login"type="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input required name="pwd" type="password" class="form-control" id="password" placeholder="Mot de passe">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <button name="book" type="submit" class="btn btn-primary">Valider</button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>


<?php

 ?>
