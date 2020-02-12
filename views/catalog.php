<?php
	require "../templates/template.php";

	function getContent(){
?>
	
	<h1 class="text-center py-4">Catalog</h1>
	<div class="container">
		<div class="row">
			<?php
				$products = file_get_contents("../assets/lib/products.json");
				$products_array = json_decode($products, true);

				foreach($products_array as $product){
					?>
						<div class="col-lg-4 py-2">
							<div class="card">
								<img class="card-img-top" height="300px" src="../assets/lib/<?php echo $product["image"]; ?>"></img>
								<div class="card-body">
									<h5 class="card-title"><?php echo $product["name"];?></h5>
									<p class="card-text">Price: <?php echo $product["price"];?></p>
									<p class="card-text">Description: <?php echo $product["description"];?></p>
								</div>

								<?php 
								if(isset($_SESSION['email']) && $_SESSION['email'] == "admin@admin.com"){
								?>
									<div class="card-footer">
										<a href="../controllers/process_delete_product.php?name=<?php echo $product["name"]; ?>" class="btn btn-danger">Delete Product</a>
									</div>
								<?php	
								}else{
								?>
									<div class="card-footer">					
										<form method="POST" action="../controllers/process_addToCart.php">
											 <input type="hidden" value="<?php echo $product["name"];?>" name="name">
											 <input type="number" name="quantity" value="1">
											 <button type="submit" class="btn btn-info">Add To Cart</button>
										</form>
									</div>	
								<?php
								}
								?>

							</div>
						</div>
					<?php
				}
			?>
		</div>
	</div>
<?php
	}
?>