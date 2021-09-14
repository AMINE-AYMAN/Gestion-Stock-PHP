<?php 
	if(isset($_POST['id'])){
		$exitVente = new VenteController();
		$vente = $exitVente->getOneVente();
	}else{
		Redirect::to('ventes');
	}
	if(isset($_POST['submit'])){
		$exitVente = new VenteController();
		$exitVente->updateVente();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Modifier un vente</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
						<div class="form-group">
							<label for="date">Date*</label>
							<input type="text" name="date" class="form-control" placeholder="date"
							value="<?php echo $vente->date; ?>"
							>
						</div>
						<div class="form-group">
							<label for="bl">BL*</label>
							<input type="text" name="bl" class="form-control" placeholder="bl"
							value="<?php echo $vente->bl; ?>"
							>
						</div>
						<div class="form-group">
							<label for="nomcomplet">Nomcomplet*</label>
							<input type="text" name="nomcomplet" class="form-control" placeholder="nomcomplet"
								value="<?php echo $vente->nomcomplet; ?>">
						</div>
						<div class="form-group">
							<label for="article">Article*</label>
							<input type="text" name="article" class="form-control" placeholder="article"
								value="<?php echo $vente->article; ?>">
								<input type="hidden" name="id" value="<?php echo $vente->id_commande  ;?>">
						</div>
                        <div class="form-group">
							<label for="prix">Prix*</label>
							<input type="text" id="prix" name="prix" class="form-control" placeholder="prix"
								value="<?php echo $vente->prix; ?>">
						</div>
                        <div class="form-group">
							<label for="quantité">Quantité*</label>
							<input type="text" id="quantité" name="quantité" class="form-control" placeholder="quantité"
								value="<?php echo $vente->quantité; ?>" oninput="myFunction()">
						</div>
                        <div class="form-group">
							<label for="total">Total*</label>
							<input type="text" id="total" name="total" class="form-control" placeholder="total"
								value="<?php echo $vente->total; ?>">
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