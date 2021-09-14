<?php 
	if(isset($_POST['id'])){
		$exitStock = new StockController();
		$stock = $exitStock->getOneStock();
	}else{
		Redirect::to('stock2020');
	}
	if(isset($_POST['submit'])){
		$exitStock = new StockController();
		$exitStock->updateStock();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Modifier un produit en stock2020</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
						<div class="form-group">
							<label for="descriptionn">Produit*</label>
							<input type="text" name="descriptionn" class="form-control" placeholder="descriptionn"
							value="<?php echo $stock->descriptionn; ?>"
							>
						</div>
						<div class="form-group">
							<label for="prix">Prix*</label>
							<input type="text" name="prix" class="form-control" placeholder="prix"
							value="<?php echo $stock->prix; ?>"
							>
						</div>
						<div class="form-group">
							<label for="dateajoute">Date*</label>
							<input type="text" name="dateajoute" class="form-control" placeholder="dateajoute"
								value="<?php echo $stock->dateajoute; ?>">
						</div>
						<div class="form-group">
							<label for="quantité">Quantité*</label>
							<input type="text" name="quantité" class="form-control" placeholder="quantité"
								value="<?php echo $stock->quantité; ?>">
								<input type="hidden" name="id" value="<?php echo $stock->id_produit ;?>">
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