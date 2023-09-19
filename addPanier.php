<?php
require_once './admin/libraries/utils.php';

?>
<?php

if(empty($_SESSION))//s'il n'ya pas de session alors je l'initialise
{
    session_start();
}
if(!isset($_SESSION['panier']))//s'il n'y a pas de session panier alors je la crée
{
    $_SESSION['panier']= array();
}

if (isset($_GET['id'])) { //si un id a été nvoyé via url alors je recupere et je filtre
    $id=  filter_input(INPUT_GET,'id') ;
    $statement = new articles;
    $article = $statement->selectById('articles','id',$id);
     if (empty($article))
     {
        die(" ce produit n'existe pas ");
     }



     if(isset($_SESSION['panier'][$id]))
     {
        $produitPanier = $_SESSION['panier'][$id]++;
        
        $quantité = $_SESSION['panier'][$id];
        header('location:index.php');

     }else
     {
        $_SESSION['panier'][$id]=1;
     header('location:index.php');
     }
     
   }

?>