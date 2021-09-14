<?php 

class StockController{

	public function getAllStock(){
		$stocks = Stock::getAll();
		return $stocks;
	}

	public function getOneStock(){
		if(isset($_POST['id'])){
			$data = array(
				'id' => $_POST['id']
			);
			$stock = Stock::getStock($data);
			return $stock;
		}
	}
	public function findStocks(){
		if(isset($_POST['find'])){
			$data = array('search' => $_POST['find']);
		}
		$stocks = Stock::searchStock($data);
		return $stocks;
	} 

	public function addStock(){
		if(isset($_POST['submit'])){
			$data = array(
				'descriptionn' => $_POST['descriptionn'],
                'prix' => $_POST['prix'],
                'dateajoute' => $_POST['dateajoute'],
                'quantité' => $_POST['quantité'],
			);
			$result = Stock::add($data);
			if($result === 'ok'){
				Session::set('success','Produit Ajouté');
				Redirect::to('stock2020');
			}else{
				echo $result;
			}
		}
	}

	public function updateStock(){
		if(isset($_POST['submit'])){
			$data = array(
				'id_article' => $_POST['id'],
				'descriptionn' => $_POST['descriptionn'],
				'prix' => $_POST['prix'],
				'dateajoute' => $_POST['dateajoute'],
				'quantité' => $_POST['quantité'],
			);
			$result = Stock::update($data);
			if($result === 'ok'){
				Session::set('success','Produit Modifié');
				Redirect::to('stock2020');
			}else{
				echo $result;
			}
		}
	}
	public function deleteStock(){
		if(isset($_POST['id'])){
			$data['id'] = $_POST['id'];
			$result = Stock::delete($data);
			if($result === 'ok'){
				Session::set('success','Produit Supprimé');
				Redirect::to('stock2020');
			}else{
				echo $result;
			}
		}
	}

}



?>