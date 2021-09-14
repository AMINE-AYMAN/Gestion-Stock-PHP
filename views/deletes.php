<?php 
	if(isset($_POST['id'])){
		$exitStock = new StockController();
		$exitStock->deleteStock();
	}
?>