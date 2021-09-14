<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
		<?php include('./views/includes/alerts.php');?>
			<div class="card">
				<div class="card-header">Veuillez choisir le type de vente</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>vente" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a><br><br>
					<form action="ventes" method="post">
                    <div class="form-group">
					        <input type="hidden" name="type_payement" class="form-control" value="cash">
							<button class="form-control">Vente cash</button>
					</div>
					</form>
					<form action="ventes" method="post">
                    <div class="form-group">
					        <input type="hidden" name="type_payement" class="form-control" value="crédit">
							<button class="form-control">Vente crédit</button>
					</div>
					</form>
					<form action="ventemagasin" method="post">
                    <div class="form-group">
							<button class="form-control">Vente magasin</button>
					</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>