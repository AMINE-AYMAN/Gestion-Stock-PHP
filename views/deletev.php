<?php 
	if(isset($_POST['id'])){
		$exitVente = new VenteController();
		$exitVente->deleteVente();
	}
?>