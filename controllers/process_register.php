<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$password = sha1($_POST['password']); //encrypt

	$new_user = [
		"firstName" => $firstName,
		"lastName" => $lastName,
		"email" => $email,
		"password" => $password
	];

	if($lastName !== "" && $lastName !== "" && $email !== "" && $password !== ""){
		$json = file_get_contents("../assets/lib/users.json"); //where?
		$users = json_decode($json, true);
		array_push($users, $new_user);
	
		$to_write = fopen("../assets/lib/users.json", "w");
		fwrite($to_write, json_encode($users, JSON_PRETTY_PRINT));
		fclose($to_write);

		header('location: ../views/login.php');
	}else{
		echo "Please fill out the form properly";
	}
?>