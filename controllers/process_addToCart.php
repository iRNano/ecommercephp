<?php  
	session_start();

	$name = $_POST["name"];
	$quantity = $_POST["quantity"];
	
	if(!isset($_SESSION['cart'][$name])){
		$_SESSION['cart'][$name] = $quantity;
	}else{
		$_SESSION['cart'][$name] += $quantity;
	};

	header("location: ../views/catalog.php");
?>