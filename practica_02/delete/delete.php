<?php
include_once('../config/db_conf.php');
include_once('../utilities/helper.php');

$sql = 'DELETE FROM `schedule` WHERE `schedule`.`pk` = '. $_POST['pk'];
if(empty($_POST['pk'])){ send_err(-1, '<p>Introduzca el número de registro a eliminar</p>'); exit; }						
if(!mysqli_query($db_conn, $sql)){ send_err(-2, '<p>No es posible eliminar el registro</p>'); exit; }

$info[] = array("code"=>1,"message"=>"<p>Registro eliminado correctamente</p>");
die(json_encode($info));
unset($_POST, $db_conn);
mysqli_close($db_conn);

exit; /*-- EXIT FILE --*/ ?>