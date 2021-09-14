<?php 

class VentemController{

	public function getAllVentem(){
		$ventems = Ventem::getAll();
		return $ventems;
	}

	public function getOneVentem(){
		if(isset($_POST['id'])){
			$data = array(
				'id' => $_POST['id']
			);
			$ventem = Ventem::getVentem($data);
			return $ventem;
		}
	}
	public function findVentems(){
		if(isset($_POST['find'])){
			$data = array('search' => $_POST['find']);
		}
		$ventems = Ventem::searchVentem($data);
		return $ventems;
	} 

	public function addVentem(){
		if(isset($_POST['addvm'])){
			$data = array(
				'date' => $_POST['date'],
				'article' => $_POST['article'],
				'quantité' => $_POST['quantité'],
				'magasin' => $_POST['magasin'],
			);
			$result = Ventem::add($data);
			if($result === 'ok'){
				Session::set('success','Vente Ajouté');
				Redirect::to('ventemagasin');
			}else{
				echo $result;
			}
		}
	}

	public function updateVentem(){
		if(isset($_POST['submit'])){
			$data = array(
				'id_ventemagasin' => $_POST['id'],
				'date' => $_POST['date'],
				'article' => $_POST['article'],
				'quantité' => $_POST['quantité'],
				'magasin' => $_POST['magasin'],
			);
			$result = Ventem::update($data);
			if($result === 'ok'){
				Session::set('success','Vente Modifié');
				Redirect::to('ventemagasin');
			}else{
				echo $result;
			}
		}
	}
	public function deleteVentem(){
		if(isset($_POST['id'])){
			$data['id'] = $_POST['id'];
			$result = Ventem::delete($data);
			if($result === 'ok'){
				Session::set('success','Vente Supprimé');
				Redirect::to('ventemagasin');
			}else{
				echo $result;
			}
		}
	}

}



?>