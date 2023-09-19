<?php
require_once '../libraries/utils.php';

$requete = 'SELECT DISTINCT qualite FROM articles';
$colonne = 'DISTINCT qualite';
$table = 'articles';
$article =  new articles();
$qualite = $article->selectAllByColonne($table,$colonne);
echo json_encode($qualite)







?>