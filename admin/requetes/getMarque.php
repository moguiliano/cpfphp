

<?php
//recuperer les marques
require_once '../libraries/utils.php';
$marque = new articles();
$table = 'marques';
echo json_encode($marque->selectAll($table));
//ok
?>