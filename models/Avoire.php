<?php 

class Avoire {

	static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT * FROM avoire');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}

	static public function getAvoire($data){
		$id = $data['id'];
		try{
			$query = 'SELECT * FROM avoire WHERE id_avoire=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			$bulmest = $stmt->fetch(PDO::FETCH_OBJ);
			return $bulmest;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function add($data){
		$stmt = DB::connect()->prepare('INSERT INTO avoire (date,nomcomplet,article,quantité)
			VALUES (:dt,:nc,:ar,:qu)');
		$stmt->bindParam(':dt',$data['date']);
		$stmt->bindParam(':nc',$data['nomcomplet']);
		$stmt->bindParam(':ar',$data['article']);
        $stmt->bindParam(':qu',$data['quantité']);

		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	}

	static public function updateq(){
		/*$query = 'SELECT * FROM artcile WHERE codebare=:cd';
        $stmt1 = DB::connect()->prepare($query);
        $stmt1->execute(array(":cd" => $_POST['codebare']));
        $stmt1-> execute();
		$data = $stmt1->fetch(PDO::FETCH_OBJ);
       if($data->quantité >= $_POST["quantité"]){*/
		$stmt = DB::connect()->prepare('UPDATE artcile set quantité=quantité+ :qu where codebare=:cd');
		$stmt->bindParam(':qu',$_POST['quantité']);
		$stmt->bindParam(':cd',$_POST['codebare']);
		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	
	}

	static public function updatequ(){
		/*$query = 'SELECT * FROM artcile WHERE codebare=:cd';
        $stmt1 = DB::connect()->prepare($query);
        $stmt1->execute(array(":cd" => $_POST['codebare']));
        $stmt1-> execute();
		$data = $stmt1->fetch(PDO::FETCH_OBJ);
       if($data->quantité >= $_POST["quantité"]){*/
		$stmt = DB::connect()->prepare('UPDATE artcile set quantité=quantité+ :qu where id_article=:cd');
		$stmt->bindParam(':qu',$_POST['quantité']);
		$stmt->bindParam(':cd',$_POST['id_a']);
		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	
	}

	static public function update($data){
		$stmt = DB::connect()->prepare('UPDATE avoire SET date=:dt,nomcomplet=:nc,article=:ar,quantité=:qu WHERE id_avoire=:id');
		$stmt->bindParam(':id',$data['id_avoire']);
		$stmt->bindParam(':dt',$data['date']);
		$stmt->bindParam(':nc',$data['nomcomplet']);
		$stmt->bindParam(':ar',$data['article']);
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
			$query = 'DELETE FROM avoire WHERE id_avoire=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			if($stmt->execute()){
				return 'ok';
			}
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function searchAvoire($data){
		$search = $data['search'];
		try{
			$query = 'SELECT * FROM avoire WHERE nomcomplet LIKE ?';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array('%'.$search.'%'));
			$avoires = $stmt->fetchAll();
			return $avoires;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}
}
