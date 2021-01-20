<?php
include_once('../../config/db_conf.php');

$sql = 'DELETE FROM `schedule` WHERE `schedule`.`pk` = '. $_POST['pk'];
if(empty($_POST['pk'])){ echo('<p>Introduzca el número de registro a eliminar</p>'); exit; }						
if(!mysqli_query($db_conn, $sql)){ echo('<p>No es posible eliminar el registro</p>'); exit; }

echo('<p>Registro eliminado correctamente</p>');

mysqli_close($db_conn);
unset($_POST, $db_conn);
exit; /*-- EXIT FILE --*/ ?>