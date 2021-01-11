<?php
	include '../config/db_conf.php';
	
	if (!mysqli_query($conexion, "INSERT INTO php_inicial_ruben (name, first_last_name, second_last_name, phone) VALUES ('Antonio', 'Garcia', 'Gracia', '')")){echo "no es posible insertar los datos";exit;}
		
	$resultado = mysqli_query($conexion, "SELECT * FROM `php_inicial_ruben` WHERE 1");
		
	echo ('<table border=1><tr><th>NOMBRE:</th><th>PRIMNER APELLIDO:</th><th>SEGUNDO APELLIDO:</th><th>TELEFONO:</th></tr>');
		
		while ($fila = mysqli_fetch_row($resultado)) {
					
			$name = $fila[0];
			$first_last_name = $fila[1];
			$second_last_name = $fila[2];
			$phone = $fila[3];
				
			echo("<tr><td>${name}</td><td>${first_last_name}</td><td>${second_last_name}</td><td>${phone}</td></tr>");
		}
	echo ('</table>');	
?>	