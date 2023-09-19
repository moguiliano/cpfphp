<?php
require_once 'libraries/functions.php' ;
demande_de_connection();
require_once 'headadmin.html' ;
?>

<body>


  <div class="container admin">
    <div class="row">
      <h1><strong>Liste des articles </strong>
      <a href="insert.php" class="btn btn-success btn-lg">
        <span class="glyphicon glyphicon-plus"></span> Ajouter</a>
        <?php 
      $seDeconnecter='Se deconnecter';
      
      if (is_connected()) : ?>
      
   <a href ='libraries/logout.php' class="btn btn-danger btn-lg"><?=$seDeconnecter?></a>    
        <?php endif; ?>
      </h1>
    
        
      <table class="table table-striped table-bordered">
        <!-- pour faire bordure arrondis et effet zebrure -->
        <thead>
          <!-- en tete de la table -->
          <tr>
            <!-- tr = ligne -->

            <th><a href="#">Nom</a></th><!--  une colonne -->
            <th><a>couleur</a></th>
            <th><a>Prix</a></th>
            <th><a>Catégorie</a></th>
            <th><a>Type</a></th>
            <th><a>Marque</a></th>
            <th><a>stock</a></th>
            <th>actions</th>

          </tr>
        </thead>
        <tbody>
          <?php
          require 'database.php';
          $db = Database::connect();
          $statement = $db->query('SELECT * FROM articles');
          while ($article = $statement->fetch()) {
            echo        '<tr>
                      <td>' . $article['nom'] . '</td>
                      <td>' . $article['couleur'] . '</td>
                      <td>' . $article['prix'] . '</td>
                      <td>' . $article['categorie'] . '</td>
                      <td>type</td>
                      <td>marque</td>
                      <td>stock</td>
                      
                      <td>
                      <a type="button" class="btn btn-info" href="select.php?id=' . $article['id'] . '">voir</a>
                      <a type="button" class="btn btn-warning" href="update.php?id=' . $article['id'] . '">Modifier</a>
                      <a type="button" class="btn btn-danger" href="delete.php?id=' . $article['id'] . '">Supprimer</a>                      
                      </td>
                      
                      </tr>';
          }
          if (isset($_POST['value'])) {
            $value = filter_input(INPUT_POST, 'value');
            require 'database.php';
            $db = Database::connect();
            $statement = $db->query('SELECT * FROM articles order by id_categorie');
          };
          ?>

</body>