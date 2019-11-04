<?php $title = 'Liste des livres'; ?>
<?php ob_start(); ?>

<style>
  .panier {
    margin-top:16em;
  }
</style>
<div class="container-fluid table-primary">
  <div class="container table-dark">
    <div class="row">
      <div class="col-md-3">
        <div class="image">
          <img src=<?php echo $book ['imageLink']; ?> class="card-img-top" alt="photo" style="width:14rem;height: 18rem;">
        </div>
      </div>
      <div class="col-md-7">
        <table class="table table-striped table-active">
            <tbody>
                <tr>
                  <th>Titre:</th>
                    <td><?php echo $book['title']; ?></td>
                </tr>
                <tr>
                  <th>De:</th>
                    <td><?php echo $book['author']; ?></td>
                </tr>
                <tr>
                  <th>Pays:</th>
                    <td><?php echo $book['country']; ?></td>
                </tr>
                <tr>
                  <th>Nombre de pages:</th>
                    <td><?php echo $book['pages']; ?></td>
                </tr>
                <tr>
                  <th>Langue:</th>
                    <td><?php echo $book['language']; ?></td>
                </tr>
                <tr>
                  <th>Année:</th>
                    <td><?php echo $book['year']; ?></td>
                </tr>
            </tbody>
        </table>
      </div>
      <div class="col-md-2">
        <div class="panier">
          <button type="button" class="btn btn-primary">Ajouter au panier</button>
        </div>
      </div>
    </div>
  </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('public/index.php'); ?>
