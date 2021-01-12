<?php
include_once('../config/db_conf.php');
$insert=false;

//si esta vacio, contrario al original
if (empty($_POST)) { $error[]= '<p>No se han enviado datos</p>'; $insert ++; }

// Comprobar si llegaron los campos requeridos, contrario al original
if (!isset($_POST['name'], $_POST['first_last_name'], $_POST['second_last_name'], $_POST['phone'])) { $error[] = '<p>No se han recibido todos los datos requeridos</p>'; $insert++; }

//comprobar nombre
if (empty($_POST['name'])) { $error[] = '<p>Campo nombre no puede estar vacio</p>'; $insert ++; }
if (strlen($_POST['name']) > 40) { $error[] = '<p>Nombre de maximo 40 caracteres</p>'; $insert ++; }

//comprobar primer apellido
if (empty($_POST['name'])) { $error[] = '<p>Campo nombre no puede estar vacio</p>'; $insert ++; }
if (strlen($_POST['name']) > 40) { $error[] = '<p>Nombre de maximo 40 caracteres</p>'; $insert ++; }				

//comprobar segundo apellido
if (empty($_POST['second_last_name'])) { $error[] = '<p>Campo segundo apellido no puede estar vacio</p>'; $insert ++; }
if (strlen($_POST['second_last_name']) > 40) { '<p>Segundo apellido de maximo 40 caracteres</p>'; $insert ++; 

	//comprobar telefono
if(empty($_POST['phone'])){ $error []= '<p>Campo telefono no puede estar vacio</p>'; $insert ++; }
if (!strlen($_POST['phone']) == 9){ $error[] = '<p>Campo telefono deben ser 9 cifras</p>'; $insert ++; }
if (ctype_digit($_POST['phone'])){ $error[] = '<p>Campo telefono deben ser numeros</p>'; $insert ++; }

//insertamos datos																			
if($insert ==0){ $error = '<p>Datos introducidos correctamente, inserto en tabla</p>'; }

if (!mysqli_query($db_conn, "
    INSERT INTO php_inicial_ruben (name, first_last_name, second_last_name, phone)
    VALUES ('".$_POST['name']."', '".$_POST['first_last_name']."', '".$_POST['second_last_name']."', '".(int)$_POST['phone']."')"
)) { $error = '<p>No es posible insertar los datos</p>';exit; }

$sql_result = mysqli_query($db_conn, "SELECT * FROM php_inicial_ruben");

while ($row = mysqli_fetch_array($sql_result)) { $table[] = array('name_tbl'=>$row[0],'first_last_name_tbl'=>$row[1],'second_last_name_tbl'=>$row[2],'phone_tbl'=>$row[3]); }
$table[] = $error;
$json_table =json_encode($table);
echo $json_table;

mysqli_free_result($sql_results);

unset($_POST, $db_conn, $sql_results, $row);
mysqli_close($db_conn);
exit; /*-- EXIT FILE --*/ ?>

