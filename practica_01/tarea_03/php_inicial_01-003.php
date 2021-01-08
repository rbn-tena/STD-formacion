<?php
	include '../db_conf.php';
	$insert=false;
	
	//si es diferente a vacio
	if(!empty($_POST)){
		// Comprobar si llegaron los campos requeridos
		if(isset($_POST['name'], $_POST['first_last_name'], $_POST['second_last_name'], $_POST['phone'])){
			//comprobar nombre
			if(!empty($_POST['name'])){ 
				if(strlen($_POST['name']) < 40){$name= $_POST['name'];}
				else{$error[] = '<p>Nombre de maximo 40 caracteres</p>'; $insert ++; }
			}
			else{$error[] = '<p>Campo nombre no puede estar vacio</p>'; $insert ++; }		
			
		//comprobar primer apellido ----REFERENCIA ESTILO-----
			if(!empty($_POST['first_last_name'])){
				if(strlen($_POST['first_last_name']) < 40){ $first_last_name = $_POST['first_last_name']; }
				else{ $error[] = '<p>Primer apellido de maximo 40 caracteres</p>'; $insert ++; }	
			}
			else{$error[] = '<p>Campo primer apellido no puede estar vacio</p>'; $insert ++; }		
							
			//comprobar segundo apellido
			if(!empty($_POST['second_last_name'])){
				if (strlen($_POST['second_last_name']) < 40){ $second_last_name = $_POST['second_last_name']; }
				else{ $error[] = '<p>Segundo apellido de maximo 40 caracteres</p>'; $insert ++; }	
			}
			else{ $error[] = '<p>Campo segundo apellido no puede estar vacio</p>'; $insert ++; }	
									
									//comprobar telefono
			if(!empty($_POST['phone'])){
				if (strlen($_POST['phone']) == 9){ 
					if (ctype_digit($_POST['phone'])){ $phone = (int)$_POST['phone']; }
					else{ $error[] = '<p>Campo telefono deben ser numeros</p>'; $insert ++; }
				}
				else{ $error[] = '<p>Campo telefono deben ser 9 cifras</p>'; $insert ++; }
			}
			else{ $error []= '<p>Campo telefono no puede estar vacio</p>'; $insert ++; }
		}
		else{ $error[] = '<p>No se han recibido todos los datos requeridos</p>'; $insert ++; }
	}
	else{ $error[]= '<p>No se han enviado datos</p>'; $insert ++; }
	
	if($insert ==0){
		$error = '<p>Datos introducidos correctamente</p>';
		if (!mysqli_query($conexion, "INSERT INTO php_inicial_ruben (name, first_last_name, second_last_name, phone) VALUES ('$name', '$first_last_name', '$second_last_name', '$phone')")){$error = '<p>No es posible insertar los datos</p>';exit;}
	}
	
	$resultado=mysqli_query($conexion, 'SELECT * FROM `php_inicial_ruben` ');
	
	while($fila = mysqli_fetch_array($resultado)){
		
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

