<?php 
	if(isset($_POST['id'])){
		$exitBulmest = new BulmestController();
		$exitBulmest->deleteBulmest();
	}
?>