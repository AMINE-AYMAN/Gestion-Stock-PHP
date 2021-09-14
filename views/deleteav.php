<?php 
	if(isset($_POST['id'])){
		$exitAvoire = new AvoireController();
		$exitAvoire->deleteAvoire();
	}
?>