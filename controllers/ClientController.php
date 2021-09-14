<?php 

class ClientController{

	public function getAllClient(){
		$clients = Client::getAll();
		return $clients;
	}

	public function getOneClient(){
		if(isset($_POST['id'])){
			$data = array(
				'id' => $_POST['id']
			);
			$client = Client::getClient($data);
			return $client;
		}
	}
	public function findClients(){
		if(isset($_POST['find'])){
			$data = array('search' => $_POST['find']);
		}
		$clients = Client::searchClient($data);
		return $clients;
	} 

	public function addClient(){
		if(isset($_POST['submit'])){
			$data = array(
				'nomcomplet_p' => $_POST['nomcomplet_p'],
                'numerogsm_p' => $_POST['numerogsm_p'],
                'cin_p' => $_POST['cin_p'],
				'nomcomplet_g' => $_POST['nomcomplet_g'],
                'numerogsm_g' => $_POST['numerogsm_g'],
                'cin_g' => $_POST['cin_g'],
                'supérficies' => $_POST['supérficies'],
                'cultures' => $_POST['cultures'],
                'adresse' => $_POST['adresse'],
			);
			$result = Client::add($data);
			if($result === 'ok'){
				Session::set('success','client Ajouté');
				Redirect::to('clients');
			}else{
				echo $result;
			}
		}
	}

	public function updateClient(){
		if(isset($_POST['submit'])){
			$data = array(
				'id_client' => $_POST['id'],
				'nomcomplet_p' => $_POST['nomcomplet_p'],
                'numerogsm_p' => $_POST['numerogsm_p'],
                'cin_p' => $_POST['cin_p'],
				'nomcomplet_g' => $_POST['nomcomplet_g'],
                'numerogsm_g' => $_POST['numerogsm_g'],
                'cin_g' => $_POST['cin_g'],
                'supérficies' => $_POST['supérficies'],
                'cultures' => $_POST['cultures'],
                'adresse' => $_POST['adresse'],
			);
			$result = Client::update($data);
			if($result === 'ok'){
				Session::set('success','Client Modifié');
				Redirect::to('clients');
			}else{
				echo $result;
			}
		}
	}
	public function deleteClient(){
		if(isset($_POST['id'])){
			$data['id'] = $_POST['id'];
			$result = Client::delete($data);
			if($result === 'ok'){
				Session::set('success','Client Supprimé');
				Redirect::to('clients');
			}else{
				echo $result;
			}
		}
	}

}



?>