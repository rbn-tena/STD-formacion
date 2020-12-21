<?php

	$server = "localhost";
	$user = "root";
	$pass = "";
	$BD = "stdcore_practicas";
	$conexion = mysqli_connect($server,$user,$pass,$BD);
	
	$name= 'Antonio';
	$first_last_name ='Garcia';
	$second_last_name ='Gracia';
	$phone = (int)'123456123';
		
		

	$sql = "INSERT INTO php_inicial_ruben (name, first_last_name, second_last_name, phone) VALUES ('$name', '$first_last_name', '$second_last_name', '$phone')";
	if (!mysqli_query($conexion, $sql)){echo "no es posible insertar los datos";exit;}
		
	$sql = "SELECT * FROM `php_inicial_ruben` WHERE 1";
		
	$resultado = mysqli_query($conexion, $sql);
		
	echo ('<table border = "1">');
		echo ('<tr>');
			echo ('<th>');
				echo("Nombre:");
			echo ('</th>');
			echo ('<th>');
				echo("Primer Apellido:");
			echo ('</th>');
			echo ('<th>');
				echo("Segundo Apellido:");
			echo ('</th>');
			echo ('<th>');
				echo("Segundo Apellido:");
			echo ('</th>');	
		echo ('</tr>');
		
		while ($fila = mysqli_fetch_row($resultado)) {
					
			$name = $fila[0];
			$first_last_name = $fila[1];
			$second_last_name = $fila[2];
			$phone = $fila[3];
				
			echo('<tr>');	
				echo ('<td>');
					echo ($name);
				echo ('</td>');
				echo ('<td>');
					echo ($first_last_name);
				echo ('</td>');
				echo ('<td>');
					echo ($second_last_name);
				echo ('</td>');
				echo ('<td>');
					echo ($phone);
				echo ('</td>');
			echo('</tr>');
		}
	echo ('</table>');	
?>	