<?php
	include '../db_conf.php';
	$insert=False;
		
	if( !empty($_POST) ){
		if( isset($_POST['name'], $_POST['first_last_name'], $_POST['second_last_name'],  /*$_POST['document'], $_POST['identification_string'], $_POST['birthdate'],*/ $_POST['phone'], $_POST['email'])){
			//validación de nombre
			if( !empty($_POST['name']) ){
				if ( strlen($_POST['name']) < 30 ){
					$name= $_POST['name'];
				}
				else{
					$error[] = '<p>Nombre de maximo 30 caracteres</p>';
					$insert +=1;
				}
			}
			else{
				$error[] = '<p>Campo nombre no puede estar vacio</p>';
				$insert +=1;
			}
			//validadción P.apellido
			if( !empty($_POST['first_last_name']) ){
				if ( strlen($_POST['first_last_name']) < 30 ){	
					$first_last_name = $_POST['first_last_name'];
				}
				else{
					$error[] = '<p>Primer apellido de maximo 30 caracteres</p>';
					$insert +=1;
				}	
			}
			else{
				$error[] = '<p>Campo primer apellido no puede estar vacio</p>';
				$insert +=1;
			}
			//validadción S.apellido
			if( !empty($_POST['second_last_name']) ){
				if ( strlen($_POST['second_last_name']) < 30 ){	
					$second_last_name = $_POST['second_last_name'];
				}
				else{
					$error[] = '<p>Segundo apellido de maximo 30 caracteres</p>';
					$insert +=1;
				}	
			}
			else{
				$error[] = '<p>Campo segundo apellido no puede estar vacio</p>';
				$insert +=1;
			}
			//validación telefono	
			if( !empty($_POST['phone']) ){
				if ( strlen($_POST['phone']) == 9){
					if ( ctype_digit($_POST['phone'])){
							
						$phone = (int)$_POST['phone'];	
																				
					}
					else{
						$error[] = '<p>Campo telefono deben ser numeros</p>';
						$insert +=1;
					}
				}
				else{
					$error[] = '<p>Campo telefono deben ser 9 cifras</p>';
					$insert +=1;
				}
			}
			else{
				$error[] = '<p>Debe incluir el telefono</p>';
				$insert +=1;
			}	
			//validación de email
			if( !empty($_POST['email']) ){
				$email= $_POST['email'];
				
			}
			else{
				$error[] = '<p>Debe incluir el email</p>';
				$insert +=1;
			}
		}	
		else{
			$error[] = '<p>No se han recibido todos los datos requeridos</p>';
			$insert +=1;
		}
	}
	else{ 
		$error[]= '<p>No se han enviado datos</p>';
		$insert +=1;	
	}
	
	if($insert ==0){
		$sql = "INSERT INTO schedule (name, first_last_name, second_last_name, phone, email) VALUES ('$name', '$first_last_name', '$second_last_name', '$phone', '$email')";
		$error = '<p>Datos introducidos correctamente</p>';
													
		if (!mysqli_query($conexion, $sql)){$error = '<p>No es posible insertar los datos</p>';exit;}
	}
		
	
	
	$json_data =json_encode($error);
	echo $json_data;
?>