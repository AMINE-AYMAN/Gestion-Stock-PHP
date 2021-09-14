<?php 
	/*if(isset($_POST['addvente'])){
		$newVente = new VenteController();
		$newVente->addVente();

		$updateq = new VenteController();
		$updateq->getupdateq();
	}*/
	$article =  "";
	$prix =  "";
	if(isset($_POST['codebare']))
	{
		$query = 'SELECT * FROM artcile WHERE codebare=:cd';
        $stmt = DB::connect()->prepare($query);
        $stmt->execute(array(":cd" => $_POST['codebare']));
        $stmt-> execute();
		$data = $stmt->fetch(PDO::FETCH_OBJ);
		$article = $data->descriptionn;
		$prix = $data->prix;
	}
	if(isset($_POST['addvente']) && isset($_POST["quantité"]))
	{
		$query = 'SELECT * FROM artcile WHERE codebare=:cd';
        $stmt = DB::connect()->prepare($query);
        $stmt->execute(array(":cd" => $_POST['codebare']));
        $stmt-> execute();
		$data = $stmt->fetch(PDO::FETCH_OBJ);
		if($data->quantité >= $_POST["quantité"]){
			
				$newVente = new VenteController();
				$newVente->addVente();
		
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
				<div class="card-header">Ajouter un vente</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>vente" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post" action="">
                    <div class="form-group">
							<label for="fournisseurs">Type vente*</label>
							<select class="custom-select" name="type_payement" id="fournisseurs">
							<option selected>Select one</option>
							<?php if (isset($_POST['type_payement']) && $_POST['type_payement']=="cash") {
								?>
								        <option selected><?php echo $_POST['type_payement']; ?></option>
                                        <option>crédit</option>
							<?php } else if (isset($_POST['type_payement']) && $_POST['type_payement']=="crédit"){
								?>
								        <option selected><?php echo $_POST['type_payement']; ?></option>
                                        <option>cash</option>
									<?php } else{?>
										<option>cash</option>
                                        <option>crédit</option>
										<?php }?>
                            </select>

						</div>
						<div class="form-group">
							<label for="bl">BL*</label>
							<input type="text" name="bl" class="form-control" placeholder="BL" value="<?php if (isset($_POST['bl'])) {echo $_POST['bl'];} ?>">
						</div>
						<div class="form-group">
							<label for="nomcomplet">Nom et prénom*</label>
							<input type="text" name="nomcomplet" class="form-control" placeholder="Nom et prénom" value="<?php if (isset($_POST['nomcomplet'])) {echo $_POST['nomcomplet'];} ?>">
						</div>

                    <div class="form-group">
							<label for="date_ajoute">Date*</label>
							<input type="date" id="dateajoute" name="date" value="<?php print(date("Y-m-d")); ?>" class="form-control">
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
							<label for="quantite">Prix*</label>
							<input type="text" id="prix" name="prix" class="form-control" value="<?php if (!empty($prix)) {echo $prix;} ?>" placeholder="Prix" oninput="myFunction()">
						</div>
                        <div class="form-group">
							<label for="quantite">Quantité*</label>
							<input type="text" id="quantité" name="quantité" class="form-control" placeholder="Quantité" oninput="myFunction()">
						</div>
                        <div class="form-group">
							<label for="quantite">Total*</label>
							<input type="text" id="total" name="total" class="form-control" enabled="disabled">
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary mt-2" name="addvente" value="valider">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
