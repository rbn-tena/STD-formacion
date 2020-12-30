<?php

	$insert=False;
		
	if( !empty($_POST) ){
		if( isset($_POST['name'], $_POST['first_last_name'], $_POST['second_last_name'],  $_POST['document'], $_POST['identification_string'], $_POST['birthdate'], $_POST['phone'], $_POST['email'])){
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
			//validación tipo de documento
			if( !empty($_POST['document']) ){
				if($_POST['document'] != 'DNI' || != 'TIE'){
					$document = $_POST['document'];
				}
				else{
					$error[] = '<p>No se ha podido determinar el tipo de documento</p>';
					$insert +=1;
				}
			}
			else{
				$error[] = '<p>No se ha seleccionado tipo de documento</p>';
				$insert +=1;
			}
			//validación indentificación
			if( !empty($_POST['identification_string']) ){
				switch ($document){
					case 'DNI':
						if (ereg ("^[0-9]{8}" && [a-zAZ]{1}, $_POST['identification_string']){
							$identification_string = $_POST['identification_string'];
						}
						else{
							$error[] = '<p>Formato incorrecto de DNI</p>';
							$insert +=1;
						}
					case 'TIE':
						
				}
			}
			else{
				$error[] = '<p>Debe incluir la identificación de se documento</p>';
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
	
	
	
	/*$name= $_POST['name'];
	$first_last_name = $_POST['first_last_name'];
	$second_last_name = $_POST['second_last_name'];
	$document = $_POST['document'];
	$identification_string = $_POST['identification_string'];
	$birthdate = $_POST['birthdate'];
	$phone = $_POST['phone'];
	$email= $_POST['email'];
	
	$data[] = array('name'=>$name,'first_last_name'=>$first_last_name,'second_last_name'=>$second_last_name, 'document'=>$document, 'identification_string'=>$identification_string, 'birthdate'=>$birthdate, 'phone'=>$phone, 'email'=> $email);
	
	$json_data =json_encode($data);
	echo $json_data;*/
?>