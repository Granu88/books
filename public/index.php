<!-- ici que les liens bootstrap etc...dans le head -->
<!-- la partie fixe du site exemple : colonnes de gauches sur bootstrap -->
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="/books/views/books.css">
        <title><?php echo $title ?></title>
    </head>

    <body>
      <nav class="navbar navbar-dark navbar-inverse">
        <form class="navbar-form navbar-right" role="search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" />
            <span class="input-group-btn">
              <button type="button" class="btn btn-primary"></button>
            </span>
          </div>
        </form>
      </nav>
      <?php echo $content ?>

    </body>
</html>
