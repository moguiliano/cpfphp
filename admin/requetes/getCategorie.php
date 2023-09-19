<?php
require_once '../libraries/utils.php';
$item = new articles();
$table = 'categories';
$colonne = 'nom';
$categorie = $item->selectAllByColonne($table,$colonne);
echo json_encode($categorie)
//ok
?>