<?php
	$server = "localhost";//ubicacion del servidor
	$user = "root";//usuario
	$pass = "";//contraseña
	$BD = "stdcore_practicas";//tabla
	$conexion = mysqli_connect($server,$user,$pass,$BD);//query de conexion
	
	$name= $_POST["name"];//variable nombre obtenida con post
	$first_last_name = $_POST['first_last_name'];//variable 1er apellido obtenida con post
	$second_last_name = $_POST['second_last_name'];//variable 2o apellido obtenida con post
	$phone = (int)$_POST['phone'];//variable telefono obtenida con post
		
	$sql = "INSERT INTO php_inicial_ruben (name, first_last_name, second_last_name, phone) VALUES ('$name', '$first_last_name', '$second_last_name', '$phone')";//query de insercion de datos
	
	if (!mysqli_query($conexion, $sql)){echo "no es posible insertar los datos";exit;}//realiza conexion y hace solicicitud / en caso de no obtener respuesta da aviso
		
	$sql = "SELECT * FROM `php_inicial_ruben` ";//query de solicitud de toda la tabla
		
	$resultado=mysqli_query($conexion, $sql);//variable que realiza la conexion y solicita datos 
	
	while ($fila = mysqli_fetch_array($resultado)) {//mysqli_fetch_array guarda en el array fila los valores de cada fila creando indices asociativos con el nombre de los campos como claves mientras no devuelva null (se ha optado por usar los indices numericos)
		
		$name_tbl = $fila[0];//array que almacena nombres
		$first_last_name_tbl = $fila[1];//array que alamacena 1eros apellidos
		$second_last_name_tbl = $fila[2];//array que almacena 2os apellidos
		$phone_tbl = $fila[3];//array que almacena telefonos 
		
		$table[] = array("name_tbl"=>$name_tbl,"first_last_name_tbl"=>$first_last_name_tbl,"second_last_name_tbl"=>$second_last_name_tbl,"phone_tbl"=>$phone_tbl);//añadimos al array table los array anteriores con sus sus indices asociativos

	}

	$json_table =json_encode($table);//convierte $table en el objeto json $json_table
	echo $json_table;//manda el objeto $json_table a index.html
	//mysql_close($conexion);//cierra la conexion con db (ERROR si lo hago no llega el json a index)
?>	
