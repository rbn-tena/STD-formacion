<?php
	/*$server = "localhost";
	$user = "root";
	$pass = "";
	$BD = "stdcore_practicas";
	$conexion = mysqli_connect($server,$user,$pass,$BD);*/
	
	include 'db_conf.php';
	
	//si es diferente a vacio
	if( !empty($_POST) ){
		// Comprobar si llegaron los campos requeridos
		if( isset($_POST['name']) && isset($_POST['first_last_name']) && isset($_POST['second_last_name']) && isset($_POST['phone'])){
			//comprobar nombre
			if( !empty($_POST['name']) ){
				if ( strlen($_POST['name']) < 40 ){
					$name= $_POST['name'];
					//comprobar primer apellido
					if( !empty($_POST['first_last_name']) ){
						if ( strlen($_POST['first_last_name']) < 40 ){	
							$first_last_name = $_POST['first_last_name'];
							//comprobar segundo apellido
							if( !empty($_POST['second_last_name']) ){
								if ( strlen($_POST['second_last_name']) < 40 ){	
									$second_last_name = $_POST['second_last_name'];
									//comprobar telefono
									if( !empty($_POST['phone']) ){
										if ( strlen($_POST['phone']) <= 9 &&  strlen($_POST['phone']) >= 9){
											if ( ctype_digit($_POST['phone'])){
							
												$phone = (int)$_POST['phone'];	
																				
												$sql = "INSERT INTO php_inicial_ruben (name, first_last_name, second_last_name, phone) VALUES ('$name', '$first_last_name', '$second_last_name', '$phone')";
												$error = 'datos introducidos correctamente';
												
												if (!mysqli_query($conexion, $sql)){$error = 'no es posible insertar los datos';exit;}
											}
											else{
												$error = 'Campo telefono deben ser numeros';
											}
										}
										else{
											$error = 'Campo telefono deben ser 9 cifras';
										}
									}
									else{
										$error = 'Campo telefono no puede estar vacio';
									}
								}
								else{
									$error = 'Segundo apellido de maximo 40 caracteres';
								}
							}
							else{
								$error = 'Campo segundo apellido no puede estar vacio';
							}	
						}
						else{
							$error[] = 'Primer apellido de maximo 40 caracteres';
						}
					}
					else{
						$error[] = 'Campo primer apellido no puede estar vacio';
					}
				}
				else{
					$error[] = 'Nombre de maximo 40 caracteres';
				}
			}
			else{
				$error[] = 'Campo nombre no puede estar vacio';
			}
		}
		else{
			$error[] = 'No se han recibido todos los datos requeridos';
		}
	}
	else{ $error[]= 'No se han enviado datos';	
	}
		
	$sql = 'SELECT * FROM `php_inicial_ruben` ';
		
	$resultado=mysqli_query($conexion, $sql);
	
	while ($fila = mysqli_fetch_array($resultado)) {
		
		$name_tbl = $fila[0];
		$first_last_name_tbl = $fila[1];
		$second_last_name_tbl = $fila[2];
		$phone_tbl = $fila[3];
		
		$table[] = array('name_tbl'=>$name_tbl,'first_last_name_tbl'=>$first_last_name_tbl,'second_last_name_tbl'=>$second_last_name_tbl,'phone_tbl'=>$phone_tbl);
	}
	$table[] = $error;
	$json_table =json_encode($table);
	echo $json_table;
?>	

