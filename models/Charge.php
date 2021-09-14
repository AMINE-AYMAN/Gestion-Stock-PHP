<?php 

class Charge {

	static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT * FROM charge');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}

	static public function getCharge($data){
		$id = $data['id'];
		try{
			$query = 'SELECT * FROM charge WHERE id_charge=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			$charge = $stmt->fetch(PDO::FETCH_OBJ);
			return $charge;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function add($data){
		$stmt = DB::connect()->prepare('INSERT INTO charge (date,nature,montant)
			VALUES (:dt,:nt,:mn)');
		$stmt->bindParam(':dt',$data['date']);
		$stmt->bindParam(':nt',$data['nature']);
		$stmt->bindParam(':mn',$data['montant']);

		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	}
	static public function update($data){
		$stmt = DB::connect()->prepare('UPDATE charge SET date=:dt,nature=:nt,montant=:mn WHERE id_charge=:id');
		$stmt->bindParam(':id',$data['id_charge']);
		$stmt->bindParam(':dt',$data['date']);
		$stmt->bindParam(':nt',$data['nature']);
		$stmt->bindParam(':mn',$data['montant']);
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
			$query = 'DELETE FROM charge WHERE id_charge=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			if($stmt->execute()){
				return 'ok';
			}
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function searchCharge($data){
		$search = $data['search'];
		try{
			$query = 'SELECT * FROM charge WHERE date LIKE ?';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array('%'.$search.'%'));
			$charges = $stmt->fetchAll();
			return $charges;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}
}
