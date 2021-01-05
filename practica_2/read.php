<?php
	include './db_conf.php';
	
	$sql = 'SELECT * FROM `schedule` ';
	$contador_where=0;
	if( !empty($_POST['name']) ){
		if ($contador_where > 0){
			$where .= " AND name = '".$_POST['name']."'";
		}
		$where ="WHERE name = '".$_POST['name']."'";
		$contador_where +=1;
	}
	
	if( !empty($_POST['first_last_name']) ){
		if ($contador_where > 0){
			$where .= " AND first_last_name = '".$_POST['first_last_name']."'";
		}
		$where ="WHERE first_last_name = '".$_POST['first_last_name']."'";
		$contador_where +=1;
	}
	
	if( !empty($_POST['second_last_name']) ){
		if ($contador_where > 0){
			$where .= " AND second_last_name = '".$_POST['second_last_name']."'";
		}
		$where ="WHERE second_last_name = '".$_POST['second_last_name']."'";
		$contador_where +=1;
	}
	
	if( !empty($_POST['phone']) ){
		if ($contador_where > 0){
			$where .= " AND phone = '".$_POST['phone']."'";
		}
		$where ="WHERE phone = '".$_POST['phone']."'";
		$contador_where +=1;
	}
	
	if( !empty($_POST['email']) ){
		if ($contador_where > 0){
			$where .= " AND phone = '".$_POST['email']."'";
		}
		$where ="WHERE email = '".$_POST['email']."'";
		$contador_where +=1;
	}
	
	if ($contador_where > 0){
		$sql .= $where;
	}
		
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

