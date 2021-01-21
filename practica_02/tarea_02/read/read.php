<?php
include_once('../../config/db_conf.php');
include_once('../../utilities/helper.php');

$sql = 'SELECT * FROM `schedule` ';
$count=0;

if(!empty($_POST['name'])){
	if ($count > 0){ $where .= " AND name = '".$_POST['name']."'"; }
	$where ="WHERE name = '".$_POST['name']."'";
	$count ++;
}

if(!empty($_POST['name_last_first'])){
	if($count > 0){ $where .= " AND first_last_name = '".$_POST['name_last_first']."'"; }
	$where ="WHERE first_last_name = '".$_POST['name_last_first']."'";
	$count ++;
}

if(!empty($_POST['name_last_second'])){
	if($count > 0){ $where .= " AND second_last_name = '".$_POST['name_last_second']."'"; }
	$where ="WHERE second_last_name = '".$_POST['name_last_second']."'";
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
	
$result=mysqli_query($db_conn, $sql);

if(!$result){ send_err(-3, '<p>No encontrados resultados</p>'); exit; }

while($row = mysqli_fetch_array($result)) { $table[] = array('row_pk'=> $row[0],'row_name'=>$row[1],'row_name_last_first'=>$row[2],'row_name_last_second'=>$row[3],'row_phone'=>$row[4],'row_email'=>$row[5]);}

die(json_encode($table));
unset($_POST, $db_conn);
mysqli_close($db_conn);

exit; /*-- EXIT FILE --*/ ?>