<?php
include_once('../config/db_conf.php');
include_once('../utilities/helper.php');

$sql = 'SELECT * FROM `schedule` ';
$count=0;

if(!empty($_POST['name'])){
	if ($count > 0){ $where .= " AND name = '".$_POST['name']."'"; }
	$where ="WHERE name = '".$_POST['name']."'";
	$count ++;
}

if(!empty($_POST['name_last_first'])){
	if($count > 0){ $where .= " AND name_last_first = '".$_POST['name_last_first']."'"; }
	$where ="WHERE name_last_first = '".$_POST['name_last_first']."'";
	$count ++;
}

if(!empty($_POST['name_last_second'])){
	if($count > 0){ $where .= " AND name_last_second = '".$_POST['name_last_second']."'"; }
	$where ="WHERE name_last_second = '".$_POST['name_last_second']."'";
	$count ++;
}

if(!empty($_POST['phone'])){
	if($count > 0){ $where .= " AND phone = '".$_POST['phone']."'"; }
	$where ="WHERE phone = '".$_POST['phone']."'";
	$count ++;
}

if(!empty($_POST['email'])){
	if($count > 0){ $where .= " AND email = '".$_POST['email']."'"; }
	$where ="WHERE email = '".$_POST['email']."'";
	$count ++;
}

if($count > 0){ $sql .= $where; }
	
$result=mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($resultado)) {
	//pendiente modificar este paso
	$pk_tbl = $fila[0];
	$name_tbl = $fila[1];
	$first_last_name_tbl = $fila[2];
	$second_last_name_tbl = $fila[3];
	$phone_tbl = $fila[4];
	$email_tbl = $fila[5];
	
	$table[] = array('row_pk'=> $pk_tbl,'row_name'=>$name_tbl,'row_name_last_first'=>$first_last_name_tbl,'row_name_last_second'=>$second_last_name_tbl,'row_phone'=>$phone_tbl, 'row_email'=>$email_tbl);
}

$json_table =json_encode($table);
echo $json_table;
?>	

