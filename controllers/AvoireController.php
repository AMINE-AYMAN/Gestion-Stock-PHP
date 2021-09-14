<?php 

class AvoireController{

	public function getAllAvoire(){
		$avoires = Avoire::getAll();
		return $avoires;
	}

	public function getupdateq(){
		$avoires = Avoire::updateq();
		return $avoires;
	}

	public function getupdatequ(){
		$avoires = Avoire::updatequ();
		return $avoires;
	}

	public function getOneAvoire(){
		if(isset($_POST['id'])){
			$data = array(
				'id' => $_POST['id']
			);
			$avoire = Avoire::getAvoire($data);
			return $avoire;
		}
	}
	public function findAvoires(){
		if(isset($_POST['find'])){
			$data = array('search' => $_POST['find']);
		}
		$avoires = Avoire::searchAvoire($data);
		return $avoires;
	} 

	public function addAvoire(){
		if(isset($_POST['addavoire'])){
			$data = array(
				'date' => $_POST['date'],
                'nomcomplet' => $_POST['nomcomplet'],
                'article' => $_POST['article'],
                'quantité' => $_POST['quantité'],
			);
			$result = Avoire::add($data);
			if($result === 'ok'){
				Session::set('success','Avoire Ajouté');
				Redirect::to('avoires');
			}else{
				echo $result;
			}
		}
	}

	public function updateAvoire(){
		if(isset($_POST['submit'])){
			$data = array(
				'id_avoire' => $_POST['id'],
				'date' => $_POST['date'],
                'nomcomplet' => $_POST['nomcomplet'],
                'article' => $_POST['article'],
                'quantité' => $_POST['quantité'],
			);
			$result = Avoire::update($data);
			if($result === 'ok'){
				Session::set('success','avoire Modifié');
				Redirect::to('avoires');
			}else{
				echo $result;
			}
		}
	}
	public function deleteAvoire(){
		if(isset($_POST['id'])){
			$data['id'] = $_POST['id'];
			$result = Avoire::delete($data);
			if($result === 'ok'){
				Session::set('success','article Supprimé');
				Redirect::to('avoires');
			}else{
				echo $result;
			}
		}
	}

}



?>