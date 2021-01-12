<?php

include_once('../config/db_conf.php');
$insert = false;

// CHECK REQUEST:
if (empty($_POST)) { $error[]= '<p>No se han enviado datos</p>'; $insert++; }
if (!isset($_POST['name'], $_POST['first_last_name'], $_POST['second_last_name'], $_POST['phone'])) { $error[] = '<p>No se han recibido todos los datos requeridos</p>'; $insert++; }

// CHECK name:
if (empty($_POST['name'])) { $error[] = '<p>Campo nombre no puede estar vacío</p>'; $insert++; }
if (!strlen($_POST['name']) < 40) { $error[] = '<p>Nombre de máximo 40 caracteres</p>'; $insert++; }

// CHECK name_last_1:
if (empty($_POST['first_last_name'])) { $error[] = '<p>Campo primer apellido no puede estar vacio</p>'; $insert++; }
if (!strlen($_POST['first_last_name']) < 40) {  $error[] = '<p>Primer apellido de máximo 40 caracteres</p>'; $insert++; }
            
// CHECK name_last_2:
if (empty($_POST['second_last_name'])) { $error[] = '<p>Campo primer apellido no puede estar vacio</p>'; $insert++; }
if (!strlen($_POST['second_last_name']) < 40) {  $error[] = '<p>Segundo apellido de máximo 40 caracteres</p>'; $insert++; }

// Check phone
if (!empty($_POST['phone'])) { $error []= '<p>Campo telefono no puede estar vacio</p>'; $insert ++; }
if (strlen($_POST['phone']) != 9) { $error[] = '<p>Campo telefono deben ser 9 cifras</p>'; $insert++; }
if (!ctype_digit($_POST['phone'])) { $error[] = '<p>Campo telefono deben ser numeros</p>'; $insert ++; }
      
if ($insert != 0) { die("ERROR EN DATOS, DEVOLVER JSON con ERROR y mostrarlo en View. No seguir ejecutando."); exit; }

if (!mysqli_query($conexion, "
    INSERT INTO php_inicial_ruben (name, first_last_name, second_last_name, phone)
    VALUES ('".$_POST['name']."', '".$_POST['first_last_name']."', '".$_POST['second_last_name']."', '".$_POST['phone']."')")
) { $error[] = '<p>No es posible insertar los datos</p>'; exit; }


$resultado = mysqli_query($conexion, "SELECT * FROM php_inicial_ruben");

while ($fila = mysqli_fetch_array($resultado)) { $table[] = array('name_tbl'=>$fila[0],'first_last_name_tbl'=>$fila[1],'second_last_name_tbl'=>$fila[2],'phone_tbl'=>$fila[3]); }
$table[] = $error;
$json_table =json_encode($table);
echo $json_table;


/*--END FILE--*/ ?>
