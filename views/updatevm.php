<?php 
	if(isset($_POST['id'])){
		$exitVentem = new VentemController();
		$ventem = $exitVentem->getOneVentem();
	}else{
		Redirect::to('ventemagasin');
	}
	if(isset($_POST['submit'])){
		$exitVentem = new VentemController();
		$exitVentem->updateVentem();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Modifier un vente magasin</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>ventemagasin" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
						<div class="form-group">
							<label for="date">Date*</label>
							<input type="date" name="date" class="form-control" placeholder="date"
							value="<?php echo $ventem->date; ?>"
							>
						</div>
						<div class="form-group">
							<label for="article">Article*</label>
							<input type="text" name="article" class="form-control" placeholder="article"
							value="<?php echo $ventem->article; ?>"
							>
						</div>
						<div class="form-group">
							<label for="quantité">Quantité*</label>
							<input type="text" name="quantité" class="form-control" placeholder="quantité"
								value="<?php echo $ventem->quantité; ?>">
						</div>
						<div class="form-group">
							<label for="magasin">Magasin*</label>
							<input type="text" name="magasin" class="form-control" placeholder="magasin"
								value="<?php echo $ventem->magasin; ?>">
								<input type="hidden" name="id" value="<?php echo $ventem->id_ventemagasin ;?>">
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