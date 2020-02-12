<?php 

	$name = $_POST["name"];
	$price = intval($_POST["price"]);
	$description = $_POST["description"];

	$filename = $_FILES["image"]["name"];
	$filesize = $_FILES["image"]["size"];
	$file_tmpname = $_FILES["image"]["tmp-name"];

	$file_type = strtolower(pathinfo($filename,PATHINFO_EXTENSION));

	$hasDetails = false;
	$isImg = false;

	if($name != "" && $price > 0 && $description != ""){
		$hasDetails= true;
	}
	if($file_type == "jpg" || $file_type == "jpeg" || $file_type == "png"){
		$isImg = true;
	}
	if($filesize > 0 && $isImg == true && $hasDetails == true){
		$final_path = "../assets/lib/images/" . $filename;

		move_uploaded_file($file_tmpname, $final_file);
	}else{
		echo "Invalid Details. Try Again";
	}

	$image = "images/" . $filename;

	$newProduct =[
		"name" => $name,
		"price" => $price,
		"description" => $description,
		"image" => $image
	];

	$json = file_get_contents("../assets/lib/products.json");

	$products = json_decode($json, true);

	array_push($products, $newProduct);
	$to_write = fopen("../assets/lib/products.json", "w");
	fwrite($to_write, json_encode($products, JSON_PRETTY_PRINT));
	fclose($to_write);

	header("location: ../views/catalog.php");
?>