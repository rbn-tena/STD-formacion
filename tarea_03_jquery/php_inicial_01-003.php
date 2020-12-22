<?php
	$server = "localhost";
	$user = "root";
	$pass = "";
	$BD = "stdcore_practicas";
	$conexion = mysqli_connect($server,$user,$pass,$BD);
	
	$name= $_POST["name"];
	$first_last_name = $_POST['first_last_name'];
	$second_last_name = $_POST['second_last_name'];
	$phone = (int)$_POST['phone'];	
		
	$sql = "INSERT INTO php_inicial_ruben (name, first_last_name, second_last_name, phone) VALUES ('$name', '$first_last_name', '$second_last_name', '$phone')";
	
	if (!mysqli_query($conexion, $sql)){echo "no es posible insertar los datos";exit;}
		
	$sql = "SELECT * FROM `php_inicial_ruben` ";
		
	$resultado=mysqli_query($conexion, $sql);
	
	//$table = new stdClass();

	//$table 
	
	//while ($fila = mysqli_fetch_row($resultado)) {
	while ($fila = mysqli_fetch_array($resultado)) {
		
		$name_tbl = $fila[0];
		$first_last_name_tbl = $fila[1];
		$second_last_name_tbl = $fila[2];
		$phone_tbl = $fila[3];
		
		$table[] = array("name_tbl"=>$name_tbl,"first_last_name_tbl"=>$first_last_name_tbl,"second_last_name_tbl"=>$second_last_name_tbl,"phone_tbl"=>$phone_tbl);
	}

	$json_table =json_encode($table);
	echo $json_table;
?>	

