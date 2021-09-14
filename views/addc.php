<?php 
	if(isset($_POST['submit'])){
		$newCharge = new ChargeController();
		$newCharge->addCharge();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Ajouter un nouveau Charge</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>charges" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
                    <div class="form-group">
							<label for="date">Date*</label>
							<input type="date" id="date" name="date" class="form-control" value="<?php print(date("Y-m-d")); ?>" required>
						</div>
						<div class="form-group">
							<label for="nature">Produit*</label>
							<input type="text" name="nature" class="form-control" placeholder="nature" required>
						</div>
						<div class="form-group">
							<label for="montant">Prix*</label>
							<input type="text" name="montant" class="form-control" placeholder="montant" required>
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