<?php

//include_once('../config/db_conf.php');

$case = '';

if (isset($_POST['case'])) {
    $case = $_POST['case'];
    switch ($case) {
        case 'GUARDAR' : 
            create();
            break;
        case 'VER' :
            read();
            break;
        case 'MODIFICAR' :
            update();
            break;
        case 'ELIMINAR' :
            delete();
            break;
    }
}

function create() {
include_once('../config/db_conf.php');
$error="";
// Check resquest
if(empty($_POST)){ $error .= '<p>No se han enviado datos</p>'; }
if(!isset($_POST['name'], $_POST['name_last_first'], $_POST['name_last_second'], $_POST['phone'], $_POST['email'])){ $error .= '<p>No se han recibido todos los datos requeridos</p>'; }
//Check name
if(empty($_POST['name']) ){ $error .= '<p>Campo nombre no puede estar vacio</p>'; }
if(strlen($_POST['name']) > 30 ){ $error .= '<p>Nombre de maximo 30 caracteres</p>'; }
//Check name_last_1
if(empty($_POST['name_last_first'])){ $error .= '<p>Campo primer apellido no puede estar vacio</p>'; }
if(strlen($_POST['name_last_first']) > 30){ $error .= '<p>Primer apellido de maximo 30 caracteres</p>'; }
//Check name_last_2
if(empty($_POST['name_last_second'])){ $error .= '<p>Campo segundo apellido no puede estar vacio</p>'; }
if(strlen($_POST['name_last_second']) > 30){ $error .= '<p>Segundo apellido de maximo 30 caracteres</p>';}	
//Check phone	
if(empty($_POST['phone'])){ $error .= '<p>Debe incluir el telefono</p>'; }
if(strlen($_POST['phone']) != 9){ $error .= '<p>Campo telefono deben ser 9 cifras</p>'; }
if(!ctype_digit($_POST['phone'])){ $error .= '<p>Campo telefono deben ser numeros</p>'; }
//Check email
if(empty($_POST['email'])) { $error .= '<p>Debe incluir el email</p>'; }

if (!empty($error)) { echo($error); exit; }

// Insert data
if (!mysqli_query($db_conn, "
    INSERT INTO schedule (name, first_last_name, second_last_name, phone, email)
    VALUES ('".$_POST['name']."', '".$_POST['name_last_first']."', '".$_POST['name_last_second']."', '".$_POST['phone']."', '".$_POST['email']."')")
) {echo('<p>No es posible insertar los datos</p>'); exit; }

mysqli_close($db_conn);
unset($_POST, $db_conn);

exit; 
}

function read() {
include_once('../config/db_conf.php');
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
exit;
}

function update() {
include_once('../config/db_conf.php');
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
exit;
}

function delete() {
include_once('../config/db_conf.php');
$sql = 'DELETE FROM `schedule` WHERE `schedule`.`pk` = '. $_POST['pk'];
if(empty($_POST['pk'])){ echo('<p>Introduzca el número de registro a eliminar</p>'); exit; }						
if(!mysqli_query($db_conn, $sql)){ echo('<p>No es posible eliminar el registro</p>'); exit; }

echo('<p>Registro eliminado correctamente</p>');

mysqli_close($db_conn);
unset($_POST, $db_conn);
exit;
}
/*-- EXIT FILE --*/ ?>

/*https://es.stackoverflow.com/questions/72759/enviar-valores-html-a-funcion-php*/