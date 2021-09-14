<?php 

class ChargeController{

	public function getAllCharge(){
		$charges = Charge::getAll();
		return $charges;
	}

	public function getOneCharge(){
		if(isset($_POST['id'])){
			$data = array(
				'id' => $_POST['id']
			);
			$charge = Charge::getCharge($data);
			return $charge;
		}
	}
	public function findCharges(){
		if(isset($_POST['find'])){
			$data = array('search' => $_POST['find']);
		}
		$charges = Charge::searchCharge($data);
		return $charges;
	} 

	public function addCharge(){
		if(isset($_POST['submit'])){
			$data = array(
				'date' => $_POST['date'],
                'nature' => $_POST['nature'],
                'montant' => $_POST['montant'],
			);
			$result = Charge::add($data);
			if($result === 'ok'){
				Session::set('success','Charge Ajouté');
				Redirect::to('charges');
			}else{
				echo $result;
			}
		}
	}

	public function updateCharge(){
		if(isset($_POST['submit'])){
			$data = array(
				'id_charge' => $_POST['id'],
				'date' => $_POST['date'],
                'nature' => $_POST['nature'],
                'montant' => $_POST['montant'],
			);
			$result = Charge::update($data);
			if($result === 'ok'){
				Session::set('success','Charge Modifié');
				Redirect::to('charges');
			}else{
				echo $result;
			}
		}
	}
	public function deleteCharge(){
		if(isset($_POST['id'])){
			$data['id'] = $_POST['id'];
			$result = Charge::delete($data);
			if($result === 'ok'){
				Session::set('success','Charge Supprimé');
				Redirect::to('charges');
			}else{
				echo $result;
			}
		}
	}

}



?>