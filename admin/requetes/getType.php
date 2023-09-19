<?php
require_once '../libraries/utils.php';

$requete = "SELECT 
types.nom 
from types 
INNER JOIN marques 
ON types.id_marque = marques.id 
where marques.nom = ?";

$article = new articles();
echo json_encode($article->xmlPostValue($requete));

