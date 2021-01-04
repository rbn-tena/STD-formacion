<?php
	include './db_conf.php';
	
	$sql = 'SELECT * FROM `schedule` ';
		
	$resultado=mysqli_query($conexion, $sql);
	
	while ($fila = mysqli_fetch_array($resultado)) {
		
		$name_tbl = $fila[0];
		$first_last_name_tbl = $fila[1];
		$second_last_name_tbl = $fila[2];
		$phone_tbl = $fila[3];
		$email_tbl = $fila[4];
		
		$table[] = array('name_tbl'=>$name_tbl,'first_last_name_tbl'=>$first_last_name_tbl,'second_last_name_tbl'=>$second_last_name_tbl,'phone_tbl'=>$phone_tbl, 'email_tbl'=>$email_tbl);
	}
	
	$json_table =json_encode($table);
	echo $json_table;
?>	