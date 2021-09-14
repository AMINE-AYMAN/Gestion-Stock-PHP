<?php 

class Bulmest {

	static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT * FROM bulmest');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}

	static public function getBulmest($data){
		$id = $data['id'];
		try{
			$query = 'SELECT * FROM bulmest WHERE id_bulmest=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			$bulmest = $stmt->fetch(PDO::FETCH_OBJ);
			return $bulmest;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function add($data){
		$stmt = DB::connect()->prepare('INSERT INTO bulmest (date,article,prix,quantité,total)
			VALUES (:dt,:ar,:pr,:qu,:tt)');
		$stmt->bindParam(':dt',$data['date']);
		$stmt->bindParam(':ar',$data['article']);
		$stmt->bindParam(':pr',$data['prix']);
        $stmt->bindParam(':qu',$data['quantité']);
		$stmt->bindParam(':tt',$data['total']);

		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	}
	static public function update($data){
		$stmt = DB::connect()->prepare('UPDATE bulmest SET date=:dt,article=:ar,prix=:pr,quantité=:qu,total=:tt WHERE id_bulmest=:id');
		$stmt->bindParam(':id',$data['id_bulmest']);
		$stmt->bindParam(':dt',$data['date']);
		$stmt->bindParam(':ar',$data['article']);
		$stmt->bindParam(':pr',$data['prix']);
        $stmt->bindParam(':qu',$data['quantité']);
		$stmt->bindParam(':tt',$data['total']);
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
			$query = 'DELETE FROM bulmest WHERE id_bulmest=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			if($stmt->execute()){
				return 'ok';
			}
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function searchBulmest($data){
		$search = $data['search'];
		try{
			$query = 'SELECT * FROM bulmest WHERE article LIKE ?';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array('%'.$search.'%'));
			$bulmests = $stmt->fetchAll();
			return $bulmests;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}
}
