<?php 
	$article =  "";
	if(isset($_POST['codebare']))
	{
		$query = 'SELECT * FROM artcile WHERE codebare=:cd';
        $stmt = DB::connect()->prepare($query);
        $stmt->execute(array(":cd" => $_POST['codebare']));
        $stmt-> execute();
		$data = $stmt->fetch(PDO::FETCH_OBJ);
		$article = $data->descriptionn;
	}
	if(isset($_POST['addvm']) && isset($_POST["quantité"]))
	{
		$query = 'SELECT * FROM artcile WHERE codebare=:cd';
        $stmt = DB::connect()->prepare($query);
        $stmt->execute(array(":cd" => $_POST['codebare']));
        $stmt-> execute();
		$data = $stmt->fetch(PDO::FETCH_OBJ);
		if($data->quantité >= $_POST["quantité"]){
			
			$newVentem = new VentemController();
			$newVentem->addVentem();
		
				$updateq = new VenteController();
				$updateq->getupdateq();
			}
			else{
				echo "<script>alert('Quantité non disponible');</script>";
			}
		
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Ajouter un nouveau vente magasin</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>ventemagasin" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
					<div class="form-group">
							<label for="date_ajoute">Date ajoute*</label>
							<input type="date" id="dateajoute" name="date" class="form-control" value="<?php print(date("Y-m-d")); ?>" required>
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
							<input type="text" name="quantité" class="form-control" placeholder="quantité" value="<?php if (isset($_POST['quantité'])) {echo $_POST['quantité'];} ?>">
						</div>
						<div class="form-group">
							<label for="magasin">Magasin*</label>
							<select class="custom-select" name="magasin" id="magasin" required>
                                        <option selected>Select one</option>
                                        <option>TAOUJDATE</option>
                                        <option>IMOUZZAR</option>
										<option>MEKNES</option>
                                    </select>
						</div>
						<div class="form-group">
						<input type="submit" class="btn btn-primary mt-2" name="addvm" value="valider">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>