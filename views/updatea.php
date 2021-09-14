<?php 
	if(isset($_POST['id'])){
		$exitArticle = new ArticleController();
		$article = $exitArticle->getOneArticle();
	}else{
		Redirect::to('articles');
	}
	if(isset($_POST['submit'])){
		$exitArticle = new ArticleController();
		$exitArticle->updateArticle();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Modifier un article</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>articles" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form action="" method="post">
						<div class="form-group">
							<label for="descriptionn">Article*</label>
							<input type="text" name="descriptionn" class="form-control" placeholder="descriptionn"
							value="<?php echo $article->descriptionn; ?>"
							>
						</div>
						<div class="form-group">
							<label for="prix">Prix*</label>
							<input type="text" name="prix" class="form-control" placeholder="prix"
							value="<?php echo $article->prix; ?>"
							>
						</div>
						<div class="form-group">
							<label for="dateajoute">Date*</label>
							<input type="text" name="dateajoute" class="form-control" placeholder="dateajoute"
								value="<?php echo $article->dateajoute; ?>">
						</div>
						<div class="form-group">
							<label for="quantité">Quantité*</label>
							<input type="text" name="quantité" class="form-control" placeholder="quantité"
								value="<?php echo $article->quantité; ?>">
								<input type="hidden" name="id" value="<?php echo $article->id_article ;?>">
						</div>
						<div class="form-group">
						<label for="magasin">Magsin*</label>
							<select class="form-control" name="magasin">
							    <option selected><?php echo $article->magasin; ?></option>
								<option>FES</option>
							</select>
						</div>
						<div class="form-group">
						<label for="fournisseurs">Fournisseurs*</label>
							<select class="form-control" name="fournisseurs">
								<option selected><?php echo $article->fournisseurs; ?></option>
								<option>ISSAM</option>
							</select>
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