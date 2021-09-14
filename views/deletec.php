<?php 
	if(isset($_POST['id'])){
		$exitCharge = new ChargeController();
		$exitCharge->deleteCharge();
	}
?>