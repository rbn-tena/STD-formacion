<?php
	include '../db_conf.php';
	
	$sql = 'UPDATE `schedule` SET';
	$contador_set=0;
	
	if( !empty($_POST['name']) ){
		if ($contador_set > 0){
			$set .= " , `name` = '".$_POST['name']."'";
		}
		$set ="`name` = '".$_POST['name']."'";
		$contador_set +=1;
	}
	
	if( !empty($_POST['first_last_name']) ){
		if ($contador_set > 0){
			$set .= " , `first_last_name` = '".$_POST['first_last_name']."'";
		}
		$set =" `first_last_name` = '".$_POST['first_last_name']."'";
		$contador_set +=1;
	}
	
	if( !empty($_POST['second_last_name']) ){
		if ($contador_set > 0){
			$set .= " , `second_last_name` = '".$_POST['second_last_name']."'";
		}
		$set =" `second_last_name` = '".$_POST['second_last_name']."'";
		$contador_set +=1;
	}
	
	if( !empty($_POST['phone']) ){
		if ($contador_set > 0){
			$set .= " , `phone` = '".$_POST['phone']."'";
		}
		$set =" phone = '".$_POST['phone']."'";
		$contador_set +=1;
	}
	
	if( !empty($_POST['email']) ){
		if ($contador_set > 0){
			$set .= " , `email` = '".$_POST['email']."'";
		}
		$set =" `email` = '".$_POST['email']."'";
		$contador_set +=1;
	}
	
	$where = " WHERE `schedule`.`pk` = ". $_POST['pk'];
	$sql .= $set.$where;
	
		
	$error = '<p>Datos modificados correctamente</p>';
													
	if (!mysqli_query($conexion, $sql)){$error = '<p>No es posible modificar los datos</p>';exit;}
	
	$json_table =json_encode($error);
	echo $json_table;
?>	