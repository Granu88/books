<?php //http://localhost/books/admin/
require('../utils/db.php');// je vais chercher la base de donnée (php my admin)
$db = dbConnect(); //je me connecte à la BDD

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

if ($id) {
  $stmt = $db->prepare('SELECT * FROM books WHERE id = :id');
  $stmt->bindParam('id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $book = $stmt->fetch();
}

$stmt = $db->prepare('SELECT * FROM authors ORDER BY name');//je prépare ma requête (prend tout de la table authors et classe les par ordre alphabétique)
$stmt->execute();//j'éxecute ma requête
$authors = $stmt->fetchAll();

if(isset($_POST['book'])){

  $title = (string) $_POST['title'];
  $description = (string) $_POST['description'];
  $authorId = (int) $_POST['author_id'];
  $pages = (int) $_POST['pages'];
  $wikipediaLink = (string) $_POST['wikipedia_link'];
  $year = (int) $_POST['year'];
  $language = (string) $_POST['language'];
  $country = (string) $_POST['country'];

  $maxtitlelength = 255;

  if (strlen($title) > $maxtitlelength) {
    $title = substr($title, 0, $maxtitlelength);
  }

  if (!preg_match('/^(http|https):\/\/([a-z]{2})\.wikipedia\.org\/([a-zA-Z0-9-_\/%:]+)?/i', $wikipediaLink)) {
    $wikipediaLink = '';
  }
$stmt = $db->prepare('INSERT INTO `books`(
  `title`,
  `description`,
  `author_id`,
  `pages`,
  `wikipedia_link`,
  `year`,
  `language`,
  `country`)
  VALUES (:title, :description, :author_id, :pages, :wikipedia_link, :year, :language, :country)');
$stmt->bindParam('title', $title, PDO::PARAM_STR);
$stmt->bindParam('description', $description, PDO::PARAM_STR);
$stmt->bindParam('author_id', $authorId, PDO::PARAM_INT);
$stmt->bindParam('pages', $pages, PDO::PARAM_INT);
$stmt->bindParam('wikipedia_link', $wikipediaLink, PDO::PARAM_STR);
$stmt->bindParam('year', $year, PDO::PARAM_INT);
$stmt->bindParam('language', $language, PDO::PARAM_STR);
$stmt->bindParam('country', $country, PDO::PARAM_STR);

$stmt->execute();
$id = $db->lastInsertId();

var_dump($id);
}
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1>Ajouter un livre</h1>
    <form action="./" method="POST">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="title">Titre</label>
            <input
              name="title"
              value="<?php echo isset($book) ? $book['title'] : ''?>"
              type="text"
              maxlength=30
              class="form-control"
              id="title"
              placeholder="Titre du livre">
            <small id="titleHelp" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea
              name="description"
              <?php echo isset($book) ? $book['description'] : ''?>
              class="form-control"
              id="description"
              rows="3">
           </textarea>
          </div>
          <div class="form-group">
            <label for="author_id">Auteur</label><!-- afficher la liste des auteurs -->
            <select
              name='author_id'
              class="form-control"
              id="author_id">
              <?php foreach ($authors as $author){?>
                <option <?php echo (isset($book) && $book['author_id'] === $author['id']) ? 'selected' : ''; ?> value="<?php echo $author['id']; ?>">
                  <?php echo $author['name']; ?>
                 </option>
            </select>
          </div>
          <div class="form-group">
            <label for="pages">Nombre de pages</label>
            <input
              name="pages"
              value="<?php echo isset($book) ? $book['pages'] : ''?>"
              type="number"
              step="1"
              min="0"
              class="form-control"
              id="pages">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="wikipedia_link">Liens Wikipédia</label>
            <input
              name="wikipedia_link"
              type="text"
              class="form-control"
              id="wikipedia_link">
          </div>
          <div class="form-group">
              <label for="year">Année de parution</label>
              <input
                name="year"
                value="<?php echo isset($book) ? $book['description'] : ''?>"
                type="number"
                step="1"
                class="form-control"
                id="year">
          </div>
          <div class="form-group">
            <label for="language">Langue du livre</label>
            <input
              name="language"
              type="text"
              class="form-control"
              id="language">
          </div>
          <div class="form-group">
            <label for="country">Pays</label>
            <input
              name="country"
              type="text"
              class="form-control"
              id="country">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <button name="book" type="submit" class="btn btn-primary">Valider</button>
        </div>
      </div>
    </div>
  </body>
</html>
