<?php $title = 'Liste des livres'; ?>
<?php ob_start(); ?>

<?php echo $book['title']; ?>

<?php $content = ob_get_clean(); ?>
<?php require('public/index.php'); ?>
