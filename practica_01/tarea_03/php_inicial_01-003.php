<?php

include_once('../config/db_conf.php');
$err = '';

// CHECK REQUEST:
if (empty($_POST)) { $error += '<p>No se han enviado datos</p>'; }
if (!isset($_POST['name'], $_POST['first_last_name'], $_POST['second_last_name'], $_POST['phone'])) { $error += '<p>No se han recibido todos los datos requeridos</p>'; }

// CHECK name:
if (empty($_POST['name'])) { $error += '<p>Campo nombre no puede estar vacío</p>'; }
if (!strlen($_POST['name']) < 40) { $error += '<p>Nombre de máximo 40 caracteres</p>'; }

// CHECK name_last_1:
if (empty($_POST['first_last_name'])) { $error += '<p>Campo primer apellido no puede estar vacío</p>'; }
if (!strlen($_POST['first_last_name']) < 40) {  $error += '<p>Primer apellido de máximo 40 caracteres</p>'; }
            
// CHECK name_last_2:
if (empty($_POST['second_last_name'])) { $error[] += '<p>Campo primer apellido no puede estar vacío</p>'; }
if (!strlen($_POST['second_last_name']) < 40) { $error[] += '<p>Segundo apellido de máximo 40 caracteres</p>'; }

// Check phone
if (!empty($_POST['phone'])) { $error += '<p>Campo teléfono no puede estar vacío</p>'; }
if (strlen($_POST['phone']) != 9) { $error += '<p>Campo teléfono deben ser 9 cifras</p>'; }
if (!ctype_digit($_POST['phone'])) { $error += '<p>Campo teléfono deben ser números</p>'; }

if (!empty($error)) { send_err(-1, $error); exit; }

if (!mysqli_query($conexion, "
    INSERT INTO php_inicial_ruben (name, first_last_name, second_last_name, phone)
    VALUES ('".$_POST['name']."', '".$_POST['first_last_name']."', '".$_POST['second_last_name']."', '".$_POST['phone']."')")
) { send_err(-2, '<p>No es posible insertar los datos</p>'); exit; }


$resultado = mysqli_query($conexion, "SELECT * FROM php_inicial_ruben");

while ($fila = mysqli_fetch_array($resultado)) { $table[] = array('name_tbl'=>$fila[0],'first_last_name_tbl'=>$fila[1],'second_last_name_tbl'=>$fila[2],'phone_tbl'=>$fila[3]); }

die(json_encode($json_table));


// HELPERS ----
// include_once('archivo helpers');

function send_err ($code, $message){

    /*
    {
        response {
            code: $code
            message : $message
        }
        result {}
    }
    */
    die(json_encode(json)); exit;

}


exit; /*--END FILE--*/ ?>
