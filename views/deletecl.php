<?php 
	if(isset($_POST['id'])){
		$exitClient = new ClientController();
		$exitClient->deleteClient();
	}
?>