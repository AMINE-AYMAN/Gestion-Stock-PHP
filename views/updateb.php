<?php 
	if(isset($_POST['id'])){
		$exitBulmest = new BulmestController();
		$bulmest = $exitBulmest->getOneBulmest();
	}else{
		Redirect::to('bulmests');
	}
	if(isset($_POST['submit'])){
		$exitBulmest = new BulmestController();
		$exitBulmest->updateBulmest();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Modifier un produit de bulmest</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>bulmests" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
						<div class="form-group">
							<label for="date">Date*</label>
							<input type="text" name="date" class="form-control" placeholder="date"
							value="<?php echo $bulmest->date; ?>"
							>
						</div>
						<div class="form-group">
							<label for="article">Article*</label>
							<input type="text" name="article" class="form-control" placeholder="article"
								value="<?php echo $bulmest->article; ?>">
						</div>
						<div class="form-group">
							<label for="prix">Prix*</label>
							<input type="text" id="prix" name="prix" class="form-control" placeholder="prix"
							value="<?php echo $bulmest->prix; ?>">
						</div>
						<div class="form-group">
							<label for="quantité">Quantité*</label>
							<input type="text" id="quantité" name="quantité" class="form-control" placeholder="quantité"
								value="<?php echo $bulmest->quantité; ?>" oninput="myFunction()">
								<input type="hidden" name="id" value="<?php echo $bulmest->id_bulmest ;?>">
						</div>
                        <div class="form-group">
							<label for="total">Total*</label>
							<input type="text" id="total" name="total" class="form-control" placeholder="total"
							value="<?php echo $bulmest->total; ?>">
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