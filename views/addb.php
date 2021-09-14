<?php 
	if(isset($_POST['submit'])){
		$newBulmest = new BulmestController();
		$newBulmest->addBulmest();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Ajouter un produit de bulmest</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>bulmests" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
                    <div class="form-group">
							<label for="date">Date*</label>
							<input type="date" id="date" name="date" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="article">Article*</label>
							<input type="text" name="article" class="form-control" placeholder="article" required>
						</div>
                        <div class="form-group">
							<label for="prix">Prix*</label>
							<input type="text" id="prix" name="prix" class="form-control" placeholder="prix" required>
						</div>
                        <div class="form-group">
							<label for="quantité">Quantité*</label>
							<input type="text" id="quantité" name="quantité" class="form-control" placeholder="quantité" oninput="myFunction()" required>
						</div>
                        <div class="form-group">
							<label for="total">Total</label>
							<input type="text" id="total" name="total" class="form-control" placeholder="total" required>
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