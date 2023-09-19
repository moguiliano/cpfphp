<?php
require_once '../libraries/utils.php';
$requete ="SELECT models.nom from models INNER JOIN types ON models.id_type = types.id where types.nom = ?";
$article = new articles();
echo json_encode($article->xmlPostValue($requete));

