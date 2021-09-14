<?php 

	if(isset($_POST['id'])){
		$exitAvoire = new AvoireController();
		$avoire = $exitAvoire->getOneAvoire();
	}else{
		Redirect::to('avoires');
	}
	if(isset($_POST['submit'])){
		$exitAvoire = new AvoireController();
		$exitAvoire->updateAvoire();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Modifier avoire</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>avoires" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
						<div class="form-group">
							<label for="date">Date*</label>
							<input type="text" name="date" class="form-control" placeholder="date"
							value="<?php echo $avoire->date; ?>"
							>
						</div>
						<div class="form-group">
							<label for="nomcomplet">Nom et Prénom*</label>
							<input type="text" name="nomcomplet" class="form-control" placeholder="nomcomplet"
							value="<?php echo $avoire->nomcomplet; ?>"
							>
						</div>
						<div class="form-group">
							<label for="article">Article*</label>
							<input type="text" name="article" class="form-control" placeholder="article"
								value="<?php echo $avoire->article; ?>">
						</div>
						<div class="form-group">
							<label for="quantité">Quantité*</label>
							<input type="text" name="quantité" class="form-control" placeholder="quantité"
								value="<?php echo $avoire->quantité; ?>">
								<input type="hidden" name="id" value="<?php echo $avoire->id_avoire ;?>">
								
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary" name="submit">Valider</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>