<?php 

class Stock {

	static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT * FROM produit');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}

	static public function getStock($data){
		$id = $data['id'];
		try{
			$query = 'SELECT * FROM produit WHERE id_produit=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			$stock = $stmt->fetch(PDO::FETCH_OBJ);
			return $stock;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function add($data){
		$stmt = DB::connect()->prepare('INSERT INTO produit (descriptionn,prix,dateajoute,quantité)
			VALUES (:descr,:pr,:dt,:qu)');
		$stmt->bindParam(':descr',$data['descriptionn']);
		$stmt->bindParam(':pr',$data['prix']);
		$stmt->bindParam(':dt',$data['dateajoute']);
		$stmt->bindParam(':qu',$data['quantité']);

		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	}
	static public function update($data){
		$stmt = DB::connect()->prepare('UPDATE produit SET descriptionn=:de,prix=:pr,dateajoute=:dt,quantité=:qu WHERE id_produit=:id');
		$stmt->bindParam(':id',$data['id_article']);
		$stmt->bindParam(':de',$data['descriptionn']);
		$stmt->bindParam(':pr',$data['prix']);
		$stmt->bindParam(':dt',$data['dateajoute']);
		$stmt->bindParam(':qu',$data['quantité']);
		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	}

	static public function delete($data){
		$id = $data['id'];
		try{
			$query = 'DELETE FROM produit WHERE id_produit=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			if($stmt->execute()){
				return 'ok';
			}
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function searchStock($data){
		$search = $data['search'];
		try{
			$query = 'SELECT * FROM produit WHERE descriptionn LIKE ?';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array('%'.$search.'%'));
			$stocks = $stmt->fetchAll();
			return $stocks;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}
}
