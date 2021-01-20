<?php
include_once('../../config/db_conf.php');
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

mysqli_free_result($result);
mysqli_close($db_conn);
unset($_POST, $db_conn, $result);

exit; /*-- EXIT FILE --*/ ?>