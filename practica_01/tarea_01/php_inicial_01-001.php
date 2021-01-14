<?php

include_once('../config/db_conf.php');

if (!mysqli_query($db_conn, "
	INSERT INTO php_inicial_ruben (name, first_last_name, second_last_name, phone) 
    VALUES ('Antonio', 'Garcia', 'Gracia', '')
")) {die('no es posible insertar los datos'); exit; }

$sql_results = mysqli_query($db_conn, "SELECT * FROM `php_inicial_ruben` WHERE 1");
if (mysqli_num_rows($results) == 0) { die('No results'); }

echo ('<table border=1><tr>
	<th>NOMBRE:</th>
	<th>PRIMNER <!--REVISA FALTA--> APELLIDO:</th>
	<th>SEGUNDO APELLIDO:</th>
	<th>TELÉFONO:</th>
</tr>');

while ($row = mysqli_fetch_row($sql_results)) { echo('<tr>
	<td>'.$row[0].'</td>
	<td>'.$row[1].'</td>
	<td>'.$row[2].'</td>
	<td>'.$row[3].'</td>
</tr>'); }
echo('</table>');

mysqli_free_result($sql_results); // libera mysql
unset($_POST, $db_conn, $sql_results, $row);//destruye variables
mysqli_close($db_conn);//cierra conexión
exit; /*-- EXIT FILE --*/ ?>
