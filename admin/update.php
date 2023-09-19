<?php
require_once 'libraries/functions.php' ;
demande_de_connection();
?>
<?php

    require 'database.php';

    if(!empty($_GET['id'])) 
    {
        $id = filter_input(INPUT_GET, 'id');
       
        
    }

    $erreurNom = $erreurCouleur = $erreurPrix = $erreurCategorie = $nom = $couleur = $prix = $categorie = "";

    if(!empty($_POST)) // s'il y a un post je recupere toutes les valeurs et je les stock dans une variable . is success est a true par defaut
    {
        $nom                = filter_input(INPUT_POST,'nom');
        $couleur            = filter_input(INPUT_POST,'couleur');
        $prix               = filter_input(INPUT_POST,'prix');
        $categorie          = filter_input(INPUT_POST,'categorie'); 
        
        
        $isSuccess          = true;
       
        if(empty($nom)) // si je nai pas inserer de nom de mon formulaire 
        {
            $erreurNom  = 'Ce champ ne peut pas être vide';
            $isSuccess  = false;
        }
         
        if(empty($categorie))  // si je nai pas selectionner de categorie
        {
            $erreurCategorie    = 'Ce champ ne peut pas être vide';
            $isSuccess          = false;
        }
      
      
         
        if ($isSuccess)// si is sucess est a true je met a jour les données 
        { 
            $db = Database::connect();
            $statement = $db->prepare("UPDATE articles  set nom = ?, couleur = ?, prix = ?, categorie = ?  WHERE id = ?");
            $statement->execute(array($nom,$couleur,$prix,$categorie,$id));
            Database::disconnect();
            header("Location: index.php");
        }
    }    
    else //s'il n'y a pas de post les données de l'articles sont dans l'input par defaut 
    {
        $db = Database::connect();
        $statement = $db->prepare("SELECT * FROM articles where id = ?");
        $statement->execute(array($id));
        $item = $statement->fetch();
        $nom             = $item['nom'];
        $prix            = $item['prix'];
        $couleur         = $item['couleur'];
        $categorie       = $item['categorie'];
        Database::disconnect();
    }

?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta nom="viewport" content="width=device-width, initial-scale=1.0">
        <title>CoinPourPhone</title>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
         <div class="container ">
            <div class="row">
                <div class="col-sm-12">
                    <h1><strong>Modifier un item</strong></h1>
                    <br>
                    <form class="form" action="<?php echo 'update.php?id='.$id;?>" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group"><!-- input Nom-->
                            <label for="nom">Nom:
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?php echo $nom;?>">
                            <span class="help-inline"><?php echo $erreurNom;?></span>
                        </div>
                        <div class="form-group"><!-- input Couleur-->
                            <label for="description">couleur:
                            <input type="text" class="form-control" id="couleur" name="couleur" placeholder="couleur" value="<?php echo $couleur;?>">
                            
                        </div>
                        <div class="form-group"><!-- input Prix-->
                        <label for="price">Prix: (en €)
                            <input type="number" step="0.01" class="form-control" id="prix" name="prix" placeholder="prix" value="<?php echo $prix;?>">
                        </div>


                        <div class="form-group"><!-- input Categorie-->
                            <label for="categorie">Catégorie:
                            <select class="form-control" id="categorie" name="categorie">
                            <?php
                               $db = Database::connect();
                               foreach ($db->query('SELECT * FROM categories') as $row) 
                               {
                                    if($row['id'] == $category)
                                        echo '<option selected="selected" value="'. $row['nom'] .'">'. $row['nom'] . '</option>';
                                    else
                                        echo '<option value="'. $row['nom'] .'">'. $row['nom'] . '</option>';;
                               }
                               Database::disconnect();
                            ?>
                            </select>
                            <span class="help-inline"><?php echo $erreurCategorie;?></span>
                        </div>
                        
                        <br>
                        <div class="form-actions"><!--formulaire submit ou retour-->
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                            <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                       </div>
                    </form>
                </div>
               
            </div>
         </div>
    </body>
</html>
