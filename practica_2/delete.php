<?php
	include './db_conf.php';
	
	$sql = 'DELETE FROM `schedule` WHERE `schedule`.`pk` = '. $_POST['pk'];
		
	$error = '<p>Registro eliminado correctamente</p>';
													
	if (!mysqli_query($conexion, $sql)){$error = '<p>No es posible eliminar el regisstro</p>';exit;}
	
	$json_table =json_encode($error);
	echo $json_table;
?>	