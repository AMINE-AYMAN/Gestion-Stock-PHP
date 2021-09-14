<?php 
	if(isset($_POST['id'])){
		$exitVentem = new VentemController();
		$exitVentem->deleteVentem();
	}
?>