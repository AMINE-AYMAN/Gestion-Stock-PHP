<?php 
	if(isset($_POST['submit'])){
		$createUser = new UsersController();
		$createUser->register();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-6 mx-auto">
			<?php include('./views/includes/alerts.php');?>
			<div class="card">
				<div class="card-header">
					<h3 class="text-center">Inscription</h3>
				</div>
				<div class="card-body bg-light">
			      	<form method="post" class="mr-1">
			      		<div class="form-group">
				      		<input type="text" name="fullname" placeholder="Nom & Prénom" class="form-control" required>
				      	</div>
			      		<div class="form-group">
				      		<input type="text" name="username" placeholder="Pseudo" class="form-control" required>
				      	</div>
				      	<div class="form-group">
				      		<input type="password" name="password" placeholder="Mot de passe" class="form-control" required>
				      	</div>
			      		<button name="submit" class="btn btn-sm btn-primary">Inscription</button>
			      	</form>
				</div>
				<div class="card-footer">
				<h6 class="text-center">créer un nouveau admin</h6>
				</div>
			</div>
		</div>
	</div>
</div>