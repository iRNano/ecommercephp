<?php 
	require '../templates/template.php';
	function getContent(){
	?>
		<h1 class="container">Cart Page</h1>
		<hr>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<table class="table table-stripped">
						<thead>
							<th>Product Name: </th>
							<th>Price: </th>
							<th>Quantity: </th>
							<th>Subtotal: </th>
						</thead>
						<tbody>
							<?php 

								$products = file_get_contents("../assets/lib/products.json");
								$products_array = json_decode($products, true);

								$total = 0;

								if(isset($_SESSION['cart'])){
									foreach ($_SESSION['cart'] as $name => $quantity) {
										foreach ($products_array as $product){
											if($name==$product['name']){
												$subtotal = $quantity*$product
												['price'];
												$total += $subtotal;
												?>
													<tr>
														<td><?php echo $product['name']; ?></td>
														<td><?php echo $product['price']; ?></td>
														<td><?php echo $quantity; ?></td>
														<td>
															USD <?php echo $subtotal; ?>
														</td>
														<td>
															<a href="../controllers/process_remove_item.php?name=<?php echo $product['name']?>" class="btn btn-danger">Remove Item</a>
														</td>
													</tr>
												<?php
											}
										}
									}
								}
							?>
							<tr>
								<td></td>
								<td></td>
								<td>
									<a href="../controllers/process_empty_cart.php" class="btn btn-danger">Empty Cart
									</a>
								</td>
								<td>Total:<?php echo $total; ?></td>
							</tr>
						</tbody>	
					</table>
				</div>
			</div>
		</div>
	<?php
	}
 ?>