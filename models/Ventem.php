<?php 

class Ventem {

	static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT * FROM ventemagasin');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}

	static public function getVentem($data){
		$id = $data['id'];
		try{
			$query = 'SELECT * FROM ventemagasin WHERE id_ventemagasin=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			$ventem = $stmt->fetch(PDO::FETCH_OBJ);
			return $ventem;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function add($data){
		$stmt = DB::connect()->prepare('INSERT INTO ventemagasin (date,article,quantité,magasin)
			VALUES (:dt,:ar,:qu,:mg)');
		$stmt->bindParam(':dt',$data['date']);
		$stmt->bindParam(':ar',$data['article']);
		$stmt->bindParam(':qu',$data['quantité']);
		$stmt->bindParam(':mg',$data['magasin']);

		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	}
	static public function update($data){
		$stmt = DB::connect()->prepare('UPDATE ventemagasin SET date=:dt,article=:ar,quantité=:qu,magasin=:mg WHERE id_ventemagasin=:id');
		$stmt->bindParam(':id',$data['id_ventemagasin']);
		$stmt->bindParam(':dt',$data['date']);
		$stmt->bindParam(':ar',$data['article']);
		$stmt->bindParam(':qu',$data['quantité']);
		$stmt->bindParam(':mg',$data['magasin']);
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
			$query = 'DELETE FROM ventemagasin WHERE id_ventemagasin=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			if($stmt->execute()){
				return 'ok';
			}
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function searchVentem($data){
		$search = $data['search'];
		try{
			$query = "SELECT * FROM ventemagasin WHERE magasin LIKE ? or article LIKE ? or date LIKE ?";
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array('%'.$search.'%','%'.$search.'%','%'.$search.'%'));
			$ventes = $stmt->fetchAll();
			return $ventes;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}
}
