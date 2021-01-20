<?php
include_once('../../config/db_conf.php');

$sql = 'UPDATE `schedule` SET';
$count=0;
$error="";

if(empty($_POST)){ $error .= '<p>No se han enviado datos</p>'; }

if(!empty($_POST['name'])){
	if(strlen($_POST['name']) > 30 ){ $error .= '<p>Nombre de maximo 30 caracteres</p>'; }
	if($count > 0){ $set .= " , `name` = '".$_POST['name']."'"; }
	$set ="`name` = '".$_POST['name']."'";
	$count ++;
}

if(!empty($_POST['name_last_first'])){
	if(strlen($_POST['name_last_first']) > 30){ $error .= '<p>Primer apellido de maximo 30 caracteres</p>'; }
	if ($count > 0){ $set .= " , `first_last_name` = '".$_POST['name_last_first']."'"; }
	$set =" `first_last_name` = '".$_POST['name_last_first']."'";
	$count ++;
}

if(!empty($_POST['name_last_second'])){
	if(strlen($_POST['name_last_second']) > 30){ $error .= '<p>Segundo apellido de maximo 30 caracteres</p>';}
	if ($count > 0){ $set .= " , `second_last_name` = '".$_POST['name_last_second']."'"; }
	$set =" `second_last_name` = '".$_POST['name_last_second']."'";
	$count ++;
}

if(!empty($_POST['phone'])){
	if(strlen($_POST['phone']) != 9){ $error .= '<p>Campo telefono deben ser 9 cifras</p>'; }
	if(!ctype_digit($_POST['phone'])){ $error .= '<p>Campo telefono deben ser numeros</p>'; }
	if($count > 0){ $set .= " , `phone` = '".$_POST['phone']."'"; }
	$set =" phone = '".$_POST['phone']."'";
	$count ++;
}

if(!empty($_POST['email'])){
	if($count > 0){ $set .= " , `email` = '".$_POST['email']."'"; }
	$set =" `email` = '".$_POST['email']."'";
	$count ++;
}

if (!empty($error)) { echo($error); exit; }

$where = " WHERE `schedule`.`pk` = ". $_POST['pk'];
$sql .= $set.$where;
								
if (!mysqli_query($db_conn, $sql)){ echo('<p>No es posible modificar los datos</p>'); exit; }

echo('<p>Datos modificados correctamente</p>');

mysqli_close($db_conn);
unset($_POST, $db_conn);
exit; /*-- EXIT FILE --*/ ?>