<?php

include_once('../config/db_conf.php');

//-> CHECK REQUESTS:
if (!isset($_POST)) { die('Method no valid'); exit; }
if (!isset($_POST['name'], $_POST['first_last_name'], $_POST['second_last_name'], $_POST['phone'])) { die('Parameters no valid'); exit; }
//-> Validation Phone
if(!ctype_digit($_POST['phone'])) { echo('<p>El campo teléfono no ha sido guardado, deben de ser números, por favor revise.</p>'); }
//-> DB - Data Insert:
if (!mysqli_query($db_conn, "
    INSERT INTO php_inicial_ruben (name, first_last_name, second_last_name, phone)
    VALUES ('".$_POST['name']."', '".$_POST['first_last_name']."', '".$_POST['second_last_name']."', '".(int)$_POST['phone']."')"
)) { die('no es posible insertar los datos'); exit; }

//-> DB - Data Select:
$sql_results = mysqli_query($db_conn, "SELECT * FROM php_inicial_ruben WHERE 1");
if (mysqli_num_rows($sql_results) == 0) { die('No results'); }

echo('<table border=1><tr>
    <th>NOMBRE:</th>
    <th>PRIMER APELLIDO:</th>
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

mysqli_free_result($sql_results);
mysqli_close($db_conn);
unset($_POST, $db_conn, $sql_results, $row);

exit; /*-- EXIT FILE --*/ ?>