<?php
	$email = $_POST["email"];
	$password = sha1($_POST["password"]);

	$json = file_get_contents("../assets/lib/users.json");
	$users = json_decode($json, true);

	for($i = 0; $i<count($users);$i++){
		if($users[$i]["email"] == $email && $users[$i]["password"] == $password){
			session_start();
			$_SESSION["name"] = $users[$i]["firstName"];
			$_SESSION["email"] = $users[$i]["email"];
			echo "success";
			header('location: ../../index.php');
		}
	}
	echo "Invalid User/Pass";
?>