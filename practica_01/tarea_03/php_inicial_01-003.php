<?php

include_once('../config/db_conf.php');
include_once('../utilities/helper.php');
$error = '';

// CHECK REQUEST:
if (empty($_POST)) { $error .= '<p>No se han enviado datos</p>'; }
if (!isset($_POST['name'], $_POST['first_last_name'], $_POST['second_last_name'], $_POST['phone'])) { $err .= '<p>No se han recibido todos los datos requeridos</p>'; }

// CHECK name:
if (empty($_POST['name'])) { $error .= '<p>Campo nombre no puede estar vacío</p>'; }
if (strlen($_POST['name']) > 40) { $error .= '<p>Nombre de máximo 40 caracteres</p>'; }

// CHECK name_last_1:
if (empty($_POST['first_last_name'])) { $error .= '<p>Campo primer apellido no puede estar vacío</p>'; }
if (strlen($_POST['first_last_name']) > 40) {  $error .= '<p>Primer apellido de máximo 40 caracteres</p>'; }
            
// CHECK name_last_2:
if (empty($_POST['second_last_name'])) { $error .= '<p>Campo primer apellido no puede estar vacío</p>'; }
if (strlen($_POST['second_last_name']) > 40) { $error .= '<p>Segundo apellido de máximo 40 caracteres</p>'; }

// Check phone
if (empty($_POST['phone'])) { $error .= '<p>Campo teléfono no puede estar vacío</p>'; }
if (strlen($_POST['phone']) != 9) { $error .= '<p>Campo teléfono deben ser 9 cifras</p>'; }
if (!ctype_digit($_POST['phone'])) { $error .= '<p>Campo teléfono deben ser números</p>'; }

if (!empty($error)) { send_err(-1, $error); exit; }

// Insert data
if (!mysqli_query($db_conn, "
    INSERT INTO php_inicial_ruben (name, first_last_name, second_last_name, phone)
    VALUES ('".$_POST['name']."', '".$_POST['first_last_name']."', '".$_POST['second_last_name']."', '".$_POST['phone']."')")
) { send_err(-2, '<p>No es posible insertar los datos</p>'); exit; }

// Send table
$results = mysqli_query($db_conn, "SELECT * FROM php_inicial_ruben");

while ($row = mysqli_fetch_array($results)) { $table[] = array('name_tbl'=>$row[0],'first_last_name_tbl'=>$row[1],'second_last_name_tbl'=>$row[2],'phone_tbl'=>$row[3]); }

die(json_encode($table));

mysqli_free_result($results);
unset($_POST, $db_conn, $results, $row);
mysqli_close($db_conn);

exit; /*-- EXIT FILE --*/ ?>
