<?php
	
	$name= $_POST['name'];
	$first_last_name = $_POST['first_last_name'];
	$second_last_name = $_POST['second_last_name'];
	$document = $_POST['document'];
	$identification_string = $_POST['identification_string'];
	$birthdate = $_POST['birthdate'];
	$phone = $_POST['phone'];
	$email= $_POST['email'];
	
	$data[] = array('name'=>$name,'first_last_name'=>$first_last_name,'second_last_name'=>$second_last_name, 'document'=>$document, 'identification_string'=>$identification_string, 'birthdate'=>$birthdate, 'phone'=>$phone, 'email'=> $email);
	
	$json_data =json_encode($data);
	echo $json_data;
?>