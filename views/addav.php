<?php 
    $article = "";
	if(isset($_POST["codebare"])){
		$query = 'SELECT * FROM artcile WHERE codebare=:cd';
        $stmt = DB::connect()->prepare($query);
        $stmt->execute(array(":cd" => $_POST['codebare']));
        $stmt-> execute();
		$data = $stmt->fetch(PDO::FETCH_OBJ);
		$article = $data->descriptionn;
	}
	if(isset($_POST['addavoire'])){
		$newAvoire = new AvoireController();
		$newAvoire->addAvoire();

		$updateq = new AvoireController();
		$updateq->getupdateq();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Ajouter avoire</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>avoires" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
                    <div class="form-group">
							<label for="date">Date*</label>
							<input type="date" id="date" name="date" class="form-control" value="<?php print(date("Y-m-d")); ?>" required>
						</div>
						<div class="form-group">
							<label for="nomcomplet">Nom et Prénom*</label>
							<input type="text" name="nomcomplet" class="form-control" placeholder="nomcomplet" value="<?php if (isset($_POST['nomcomplet'])) {echo $_POST['nomcomplet'];} ?>" required>
						</div>
						<div class="form-group">
							<label for="codebare">Code bare*</label>
							<input type="text" name="codebare" class="form-control" placeholder="Scanner codebare" value="<?php if (isset($_POST['codebare'])) {echo $_POST['codebare'];} ?>">
						</div>
						<div class="form-group">
							<label for="desc">Article*</label>
							<input type="text" name="article" class="form-control" value="<?php if (!empty($article)) {echo $article;} ?>" placeholder="Article">
						</div>
                        <div class="form-group">
							<label for="quantité">Quantité*</label>
							<input type="text" name="quantité" class="form-control" placeholder="quantité">
						</div>
						<div class="form-group">
						<input type="submit" class="btn btn-primary mt-2" name="addavoire" value="valider">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>