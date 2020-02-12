<?php
	require "../templates/template.php";

	function getContent(){
?>
	<h1 class="text-center py-4">Login</h1>
	<div class="row">
		<div class="col-lg-4 offset-lg-4">
			<form method="POST" action="../controllers/process_login.php">
				<div class="form-group">
					<label for="email">Email:</label>		
					<input type="text" name="email" class="form-control">
				</div>
				<div class="form-group">
					<label for="password">Password:</label>		
					<input type="password" name="password" class="form-control">
				</div>
				<button class="btn btn-success" type="submit">Login</button>
			</form>
		</div>
	</div>
<?php
	}
?>