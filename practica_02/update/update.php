<?php
include_once('../config/db_conf.php');
include_once('../utilities/helper.php');

$sql = 'UPDATE `schedule` SET';
$count=0;

if(!empty($_POST['name'])){
	if($contador_set > 0){ $set .= " , `name` = '".$_POST['name']."'"; }
	$set ="`name` = '".$_POST['name']."'";
	$concounttador_set ++;
}

if(!empty($_POST['name_last_first'])){
	if ($count > 0){ $set .= " , `name_last_first` = '".$_POST['name_last_first']."'"; }
	$set =" `name_last_first` = '".$_POST['name_last_first']."'";
	$count ++;
}

if(!empty($_POST['name_last_second'])){
	if ($count > 0){ $set .= " , `name_last_second` = '".$_POST['name_last_second']."'"; }
	$set =" `name_last_second` = '".$_POST['name_last_second']."'";
	$count ++;
}

if(!empty($_POST['phone'])){
	if($count > 0){ $set .= " , `phone` = '".$_POST['phone']."'"; }
	$set =" phone = '".$_POST['phone']."'";
	$count ++;
}

if(!empty($_POST['email'])){
	if($count > 0){ $set .= " , `email` = '".$_POST['email']."'"; }
	$set =" `email` = '".$_POST['email']."'";
	$count ++;
}

$where = " WHERE `schedule`.`pk` = ". $_POST['pk'];
$sql .= $set.$where;

$error = '<p>Datos modificados correctamente</p>';
												
if (!mysqli_query($conn, $sql)){$error = '<p>No es posible modificar los datos</p>';exit;}

$json_table =json_encode($error);
echo $json_table;
?>	