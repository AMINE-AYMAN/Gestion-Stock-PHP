<?php 
	if(isset($_POST['id'])){
		$exitClient = new ClientController();
		$client = $exitClient->getOneClient();
	}else{
		Redirect::to('clients');
	}
	if(isset($_POST['submit'])){
		$exitClient = new ClientController();
		$exitClient->updateClient();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Modifier un client</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>clients" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
						<div class="form-group">
							<label for="nomcomplet_p">Nom et Prénom Propriétaire*</label>
							<input type="text" name="nomcomplet_p" class="form-control" placeholder="nomcomplet_p"
							value="<?php echo $client->nomcomplet_p; ?>">
						</div>
						<div class="form-group">
							<label for="numerogsm_p">Numero GSM*</label>
							<input type="text" name="numerogsm_p" class="form-control" placeholder="numerogsm_p"
								value="<?php echo $client->numerogsm_p; ?>">
						</div>
						<div class="form-group">
							<label for="cin_p">CIN*</label>
							<input type="text" name="cin_p" class="form-control" placeholder="cin_p"
							value="<?php echo $client->cin_p; ?>">
						</div>
                        <div class="form-group">
							<label for="nomcomplet_g">Nom et Prénom gérant*</label>
							<input type="text" name="nomcomplet_g" class="form-control" placeholder="nomcomplet_g"
							value="<?php echo $client->nomcomplet_g; ?>">
						</div>
						<div class="form-group">
							<label for="numerogsm_g">Numero GSM*</label>
							<input type="text" name="numerogsm_g" class="form-control" placeholder="numerogsm_g"
								value="<?php echo $client->numerogsm_g; ?>">
						</div>
						<div class="form-group">
							<label for="cin_g">CIN*</label>
							<input type="text" name="cin_g" class="form-control" placeholder="cin_g"
							value="<?php echo $client->cin_g; ?>">
						</div>
                        <div class="form-group">
							<label for="supérficies">Supérficies*</label>
							<input type="text" name="supérficies" class="form-control" placeholder="supérficies"
							value="<?php echo $client->supérficies; ?>">
						</div>
                        <div class="form-group">
							<label for="cultures">Cultures*</label>
							<input type="text" name="cultures" class="form-control" placeholder="cultures"
							value="<?php echo $client->cultures; ?>">
						</div>
						<div class="form-group">
							<label for="adresse">Adresse*</label>
							<input type="text" name="adresse" class="form-control" placeholder="adresse"
								value="<?php echo $client->adresse; ?>">
								<input type="hidden" name="id" value="<?php echo $client->id_client ;?>">
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