<?php 
	if(isset($_POST['id'])){
		$exitCharge = new ChargeController();
		$charge = $exitCharge->getOneCharge();
	}else{
		Redirect::to('charges');
	}
	if(isset($_POST['submit'])){
		$exitCharge = new ChargeController();
		$exitCharge->updateCharge();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Modifier un charge</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>charges" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
						<div class="form-group">
							<label for="date">Date*</label>
							<input type="text" name="date" class="form-control" placeholder="date"
							value="<?php echo $charge->date; ?>"
							>
						</div>
						<div class="form-group">
							<label for="nature">Nature*</label>
							<input type="text" name="nature" class="form-control" placeholder="nature"
							value="<?php echo $charge->nature; ?>"
							>
						</div>
						<div class="form-group">
							<label for="montant">Montant*</label>
							<input type="text" name="montant" class="form-control" placeholder="montant"
								value="<?php echo $charge->montant; ?>">
								<input type="hidden" name="id" value="<?php echo $charge->id_charge  ;?>">
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