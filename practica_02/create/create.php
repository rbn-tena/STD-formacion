<?php
include '../config/db_conf.php';
$insert=False;
// Check resquest
if(empty($_POST)){ $error .= '<p>No se han enviado datos</p>'; $insert ++; }
if(!isset($_POST['name'], $_POST['first_last_name'], $_POST['second_last_name'], $_POST['phone'], $_POST['email'])){ $error .= '<p>No se han recibido todos los datos requeridos</p>'; $insert ++; }
//Check name
if(empty($_POST['name']) ){ $error .= '<p>Campo nombre no puede estar vacio</p>'; $insert ++; }
if(strlen($_POST['name']) > 30 ){ $error .= '<p>Nombre de maximo 30 caracteres</p>'; $insert ++; }
//Check name_last_1
if(empty($_POST['first_last_name'])){{ $error .= '<p>Campo primer apellido no puede estar vacio</p>'; $insert ++; }
if(strlen($_POST['first_last_name']) > 30){ $error .= '<p>Primer apellido de maximo 30 caracteres</p>'; $insert ++; }
//Check name_last_2
if(empty($_POST['second_last_name'])){ $error .= '<p>Campo segundo apellido no puede estar vacio</p>'; $insert ++; }
if(strlen($_POST['second_last_name']) > 30){ $error .= '<p>Segundo apellido de maximo 30 caracteres</p>'; $insert ++; }	
//Check phone	
if(!empty($_POST['phone'])){ $error .= '<p>Debe incluir el telefono</p>'; $insert ++; }
if(strlen($_POST['phone']) != 9){ $error .= '<p>Campo telefono deben ser 9 cifras</p>'; $insert ++; }
if(!ctype_digit($_POST['phone'])){ $error .= '<p>Campo telefono deben ser numeros</p>'; $insert ++; }
//Check email
if(empty($_POST['email'])) { $error .= '<p>Debe incluir el email</p>'; $insert ++; }
	//aqui me he quedado		
	if($insert ==0){
		$sql = "INSERT INTO schedule (name, first_last_name, second_last_name, phone, email) VALUES ('$name', '$first_last_name', '$second_last_name', '$phone', '$email')";
		$error = '<p>Datos introducidos correctamente</p>';
													
		if (!mysqli_query($conn, $sql)){$error = '<p>No es posible insertar los datos</p>';exit; }
	}
	
	$json_data =json_encode($error);
	echo $json_data;
?>