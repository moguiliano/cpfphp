<?php
require_once 'libraries/functions.php' ;
demande_de_connection();
?>
<?php
    require 'database.php';

    if(!empty($_GET['id'])) 
    {
        $id = filter_input(INPUT_GET,'id');
    }
     
    $db = Database::connect();
    $statement = $db->prepare("SELECT 
    articles.id, 
    articles.nom, 
    articles.couleur, 
    articles.prix, 
    articles.qualite, 
    categories.nom 
    FROM articles 
    LEFT JOIN categories 
    ON articles.id_categorie = categories.id 
    WHERE articles.id = ?");
    $statement->execute(array($id));
    $item = $statement->fetch();
    Database::disconnect();
// recuperer type , marque ,stock 
  

?>



<?php
require_once 'headadmin.html';
?>

    <body>
         <div class="container ">
         <div class="row">
               <div class="col-sm-6">
                 <?php
                 
                 //choses a afficher nom couleur prix categorie type marque stock (sous forme de liens )
                
                 ?>
                    <h1><strong>Voir un Article</strong></h1>
                    <br>
                    <form>
                      <div class="form-group">
                        <label>Nom :</label><?php echo ' ' .$item['nom']?>
                      </div>
                      <div class="form-group">
                        <label>couleur :</label><?php echo ' ' .$item['couleur']?>
                      </div>
                      <div class="form-group">
                        <label>Prix :</label><?php echo ' ' .number_format((float)$item['prix'], 2, '.', ''). ' €';?><!--nombre , nombre de decimal , separateur virgule ou point , separateur entre les 1000-->
                      </div>
                      <div class="form-group">
                        <label>Catégorie :</label><?php echo ' ' .$item['nom']
                        ?>
                      </div> <div class="form-group">
                        <label>type :</label><?php echo ' ' .$item['type']?>
                      </div>
                      <div class="form-group">
                        <label>Marque :</label><?php echo ' ' .$item['marque']?>
                      </div>
                      <div class="form-group">
                        <label>Stock :</label><?php echo ' ' .$item['stock']?>
                      </div>
                      
                    </form>
                    <br>
                    <div class="form-actions">
                      <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                    </div>
                </div> 
                
            </div>
         </div>
    </body>
</html>