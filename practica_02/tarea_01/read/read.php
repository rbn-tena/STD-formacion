<?php
include_once('../../config/db_conf.php');

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

//if (mysqli_num_rows($results) == 0) { echo('<p>No encontrados resultados</p>'); exit; }

echo('<table border=1><tr>
	<th>ID:</th>
	<th>NOMBRE:</th>
    <th>PRIMER APELLIDO:</th>
    <th>SEGUNDO APELLIDO:</th>
	<th>TELÉFONO:</th>
	<th>MAIl:</th>
</tr>');

while($row = mysqli_fetch_array($result)) { echo('<tr>
	<td>'.$row[0].'</td>
	<td>'.$row[1].'</td>
	<td>'.$row[2].'</td>
	<td>'.$row[3].'</td>
	<td>'.$row[4].'</td>
	<td>'.$row[5].'</td>
</tr>'); }
echo('</table>');

mysqli_free_result($result);
mysqli_close($db_conn);
unset($_POST, $db_conn, $result, $row);
exit; /*-- EXIT FILE --*/ ?>