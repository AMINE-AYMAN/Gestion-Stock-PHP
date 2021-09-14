<?php 

class VenteController{

	public function getAllVentecash(){
		$ventes = Vente::getAllcash();
		return $ventes;
	}

	public function getAllVentecrédit(){
		$ventes = Vente::getAllcrédit();
		return $ventes;
	}

	public function getupdateq(){
		$ventes = Vente::updateq();
		return $ventes;
	}

	public function getOneVente(){
		if(isset($_POST['id'])){
			$data = array(
				'id' => $_POST['id']
			);
			$vente = Vente::getVente($data);
			return $vente;
		}
	}
	public function findVentes(){
		if(isset($_POST['find'])){
			$data = array('search' => $_POST['find']);
		}
		$ventes = Vente::searchVente($data);
		return $ventes;
	} 

	public function addVente(){
		if(isset($_POST['addvente'])){
			$data = array(
				'date' => $_POST['date'],
				'type_payement'=> $_POST['type_payement'],
                'bl' => $_POST['bl'],
                'nomcomplet' => $_POST['nomcomplet'],
                'article' => $_POST['article'],
                'prix' => $_POST['prix'],
                'quantité' => $_POST['quantité'],
                'total' => $_POST['total'],
			);
			$result = Vente::add($data);
				if($result === 'ok'){
				Session::set('success','Vente Ajouté');
				Redirect::to('vente');
			}else{
				echo $result;
			}
			
			
		}
	}

	public function updateVente(){
		if(isset($_POST['submit'])){
			$data = array(
                'id_commande' => $_POST['id'],
				'date' => $_POST['date'],
                'bl' => $_POST['bl'],
                'nomcomplet' => $_POST['nomcomplet'],
                'article' => $_POST['article'],
                'prix' => $_POST['prix'],
                'quantité' => $_POST['quantité'],
                'total' => $_POST['total'],
			);
			$result = Vente::update($data);
			if($result === 'ok'){
				Session::set('success','Vente Modifié');
				Redirect::to('vente');
			}else{
				echo $result;
			}
		}
	}
	public function deleteVente(){
		if(isset($_POST['id'])){
			$data['id_commande'] = $_POST['id'];
			$result = Vente::delete($data);
			if($result === 'ok'){
				Session::set('success','Vente Supprimé');
				Redirect::to('vente');
			}else{
				echo $result;
			}
		}
	}

}



?>