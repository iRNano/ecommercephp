<?php 
	$name = $_GET['name'];
	$products = file_get_contents("../assets/lib/products.json");
	$products_array = json_decode($products, true);
	foreach($products_array as $index => $products){
		if($name==$products['name']){
			unset($products_array[$index]);
		};
	};

	$to_write = fopen("../assets/lib/products.json", "w");
	fwrite($to_write, json_encode($products_array, JSON_PRETTY_PRINT));
	fclose($to_write);

	header("location: " . $_SERVER['HTTP_REFERER']);
?>