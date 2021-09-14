<?php 
	if(isset($_POST['addarticle'])){
		$newArticle = new ArticleController();
		$newArticle->addArticle();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Ajouter un article</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>articles" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
                    <div class="form-group">
							<label for="date_ajoute">Date ajoute*</label>
							<input type="date" id="dateajoute" name="dateajoute" class="form-control" value="<?php print(date("Y-m-d")); ?>" required>
						</div>
						<div class="form-group">
							<label for="desc">Description*</label>
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
							<label for="magasin">Magasin*</label>
							<select class="custom-select" name="magasin" id="magasin" required>
                                        <option selected>Select one</option>
                                        <option>TAOUJDATE</option>
                                        <option>FES</option>
                                    </select>
						</div>
						<div class="form-group">
							<label for="fournisseurs">Fournisseurs*</label>
							<select class="custom-select" name="fournisseurs" id="fournisseurs" required>
                                        <option selected>Select one</option>
                                        <option>KAWTAR</option>
                                        <option>ISSAM</option>
                                        <option>MAHDI</option>
                                        <option>AMINE</option>
                                    </select>
						</div>
						<div class="form-group">
							<label for="codebare">Scanner code bare*</label>
							<input type="text" name="codebare" class="form-control" placeholder="codebare" required>
						</div>
						<div class="form-group">
						<input type="hidden" name="addarticle">
						<input type="submit" class="btn btn-primary mt-2" name="addarticle" value="valider">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>