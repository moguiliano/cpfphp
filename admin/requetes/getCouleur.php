<?php

require '../libraries/utils.php';

$stm = new articles();
$table = 'articles';
$colonne ='Distinct couleur' ;
$couleur = $stm->selectAllByColonne($table,$colonne);
echo json_encode($couleur);
//ok
