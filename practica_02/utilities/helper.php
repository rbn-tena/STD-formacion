<?php
/* ERROR CODES
   -1 = Campos de formulario incompletos o erroneos
   -2 = Error en la conexión a la base de datos
*/

function send_err($code, $message){
    
$response[] = array("code"=>$code,"message"=>$message);
die(json_encode($response)); exit;
}
?>
