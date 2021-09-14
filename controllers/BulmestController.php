<?php 

class BulmestController{

	public function getAllBulmest(){
		$bulmests = Bulmest::getAll();
		return $bulmests;
	}

	public function getOneBulmest(){
		if(isset($_POST['id'])){
			$data = array(
				'id' => $_POST['id']
			);
			$bulmest = Bulmest::getBulmest($data);
			return $bulmest;
		}
	}
	public function findBulmests(){
		if(isset($_POST['find'])){
			$data = array('search' => $_POST['find']);
		}
		$bulmests = Bulmest::searchBulmest($data);
		return $bulmests;
	} 

	public function addBulmest(){
		if(isset($_POST['submit'])){
			$data = array(
				'date' => $_POST['date'],
                'article' => $_POST['article'],
                'prix' => $_POST['prix'],
                'quantité' => $_POST['quantité'],
                'total' => $_POST['total'],
			);
			$result = Bulmest::add($data);
			if($result === 'ok'){
				Session::set('success','Article Ajouté');
				Redirect::to('bulmests');
			}else{
				echo $result;
			}
		}
	}

	public function updateBulmest(){
		if(isset($_POST['submit'])){
			$data = array(
				'id_bulmest' => $_POST['id'],
				'date' => $_POST['date'],
                'article' => $_POST['article'],
                'prix' => $_POST['prix'],
                'quantité' => $_POST['quantité'],
                'total' => $_POST['total'],
			);
			$result = Bulmest::update($data);
			if($result === 'ok'){
				Session::set('success','Article Modifié');
				Redirect::to('bulmests');
			}else{
				echo $result;
			}
		}
	}
	public function deleteBulmest(){
		if(isset($_POST['id'])){
			$data['id'] = $_POST['id'];
			$result = Bulmest::delete($data);
			if($result === 'ok'){
				Session::set('success','Article Supprimé');
				Redirect::to('bulmests');
			}else{
				echo $result;
			}
		}
	}

}



?>