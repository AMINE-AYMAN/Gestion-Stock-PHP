<?php 
	if(isset($_POST['submit'])){
		$newStock = new StockController();
		$newStock->addStock();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Ajouter un produit en stock2020</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>stock2020" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
                    <div class="form-group">
							<label for="date_ajoute">Date ajoute*</label>
							<input type="date" id="dateajoute" name="dateajoute" class="form-control" value="<?php print(date("Y-m-d")); ?>" required>
						</div>
						<div class="form-group">
							<label for="desc">Produit*</label>
							<input type="text" name="descriptionn" class="form-control" placeholder="Description" required>
						</div>
						<div class="form-group">
							<label for="prix">Prix*</label>
							<input type="text" name="prix" class="form-control" placeholder="Prix" required>
						</div>
						<div class="form-group">
							<label for="quantite">Quantité*</label>
							<input type="text" name="quantité" class="form-control" placeholder="Quantité" required>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary mt-2" name="submit">Valider</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>