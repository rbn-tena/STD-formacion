<?php
include_once('../config/db_conf.php');
include_once('../utilities/helper.php');

$sql = 'DELETE FROM `schedule` WHERE `schedule`.`pk` = '. $_POST['pk'];
	
$error = '<p>Registro eliminado correctamente</p>';
												
if (!mysqli_query($conn, $sql)){$error = '<p>No es posible eliminar el regisstro</p>'; exit; }

$json_table =json_encode($error);
echo $json_table;
?>	