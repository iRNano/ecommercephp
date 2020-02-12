<?php
	require "../templates/template.php";
	function getContent(){
?>
	<h1 class="text-center py-4">Add Gundam</h1>

	<div class="container col-lg-6 offset-lg-3">
		<form method="POST" action="../controllers/process_add_product.php"
		enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Product:</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label for="price">Price:</label>
				<input type="text" name="price" class="form-control">
			</div>
			<div class="form-group">
				<label for="description">Description:</label>
				<input type="text" name="description" class="form-control">
			</div>
			<div class="form-group">
				<label for="image">Image:</label>
				<input type="file" name="image" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Submit</button>
		</form>
	</div>

<?php		
	}
?>