<?php
require_once 'libraries/functions.php' ;
require_once 'headadmin.html';
require 'database.php';


demande_de_connection();

$db=Database::connect();

if(!empty($_GET))//on recupere l'id pour pouvoir l'uliser et en faire un echo dans le formulaire
{
    $id = filter_input(INPUT_GET, 'id');
}


if(!empty($_POST))
{   $id = filter_input(INPUT_POST, 'id');
    $db=Database::connect();
    $statement=$db->prepare('DELETE from articles WHERE id=?');
    $statement->execute(array($id));
    Database::disconnect();
    header("Location: index.php"); 
}

?>
<body>
 <div class="container admin">
    <div class="row">
        <h1><strong>Supprimer un Article</strong></h1>
        <br>
        <form class="form" action="delete.php" role="form" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <p class="alert alert-warning">Etes vous sur de vouloir supprimer cet article ?</p>
            <div class="form-actions">
              <button type="submit" class="btn btn-warning">Oui</button>
              <a class="btn btn-default" href="index.php">Non</a>
            </div>
        </form>
    </div>
</div>   
</body>
<?php

 require_once  '../footer.php';
 ?>

