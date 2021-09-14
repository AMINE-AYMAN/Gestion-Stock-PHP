<?php 
	if(isset($_POST['submit'])){
		$newClient = new ClientController();
		$newClient->addClient();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Ajouter un client</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>clients" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
                    <div class="form-group">
							<label for="nomcomplet_p">Nom et Prénom Propriétaire*</label>
							<input type="text" name="nomcomplet_p" class="form-control" placeholder="Nom et Prénom Propriétaire" required>
						</div>
						<div class="form-group">
							<label for="numerogsm_p">Numero GSM*</label>
							<input type="text" name="numerogsm_p" class="form-control" placeholder="Numero GSM" required>
						</div>
						<div class="form-group">
							<label for="cin_p">CIN*</label>
							<input type="text" name="cin_p" class="form-control" placeholder="Cin" required>
						</div>
                        <div class="form-group">
                        <label for="nomcomplet_g">Nom et Prénom Gérant*</label>
							<input type="text" name="nomcomplet_g" class="form-control" placeholder="Nom et Prénom Gérant" required>
						</div>
						<div class="form-group">
							<label for="numerogsm_g">Numero GSM*</label>
							<input type="text" name="numerogsm_g" class="form-control" placeholder="Numero GSM" required>
						</div>
						<div class="form-group">
							<label for="cin_g">CIN*</label>
							<input type="text" name="cin_g" class="form-control" placeholder="Cin" required>
						</div>
                        <div class="form-group">
                        <label for="supérficies">supérficies*</label>
							<input type="text" name="supérficies" class="form-control" placeholder="Supérficie" required>
						</div>
						<div class="form-group">
							<label for="cultures">Cultures*</label>
							<input type="text" name="cultures" class="form-control" placeholder="Cultures" required>
						</div>
						<div class="form-group">
							<label for="adresse">Adresse*</label>
							<input type="text" name="adresse" class="form-control" placeholder="adresse" required>
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