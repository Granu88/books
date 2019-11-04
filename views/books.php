<!-- entre ob_start et ob_get_clean on fait la partie qui change sur la view -->
<?php $title = 'Liste des livres'; ?>
<?php ob_start(); ?>

<style>
  .card-header {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100px;
    overflow: hidden;
  }
</style>

<h1>Liste des livres</h1>
  <div class="container">
    <div class="row">
      <?php foreach ($books as $book) { ?>
        <div class="col-lg-3 col-md-6 mt-3">
          <div class="card border-info mb-3 text-center" style="max-width: 18rem;">
            <div class="card-header border-success">
              <div class="titre">
                <h5> <?php echo $book['title']; ?> </h5>
              </div>
            </div>
              <div class="image">
                <img src=<?php echo $book ['imageLink']; ?> class="card-img-top" alt="photo" style="width:10rem;height: 18rem;">
              </div>
            <div class="card-body">
              <div class="auteur">
                <h6> <?php echo $book ['author']  ?></h6>
              </div>
            </div>
            <div class="card-footer bg-transparent border-info">
              <div class="description">
                <button type="button" class="btn btn-info">Description</button>
              </div>
              <br>
              <div class="panier">
                <button type="button" class="btn btn-primary">Ajouter au panier</button>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

  </div>

<pre>
<?php var_dump($books); ?>
</pre>
<?php $content = ob_get_clean(); ?>
<?php require('public/index.php'); ?>
