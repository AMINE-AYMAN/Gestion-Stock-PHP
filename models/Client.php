<?php 

class Client {

	static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT * FROM client');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}

	static public function getClient($data){
		$id = $data['id'];
		try{
			$query = 'SELECT * FROM client WHERE id_client=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			$client = $stmt->fetch(PDO::FETCH_OBJ);
			return $client;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function add($data){
		$stmt = DB::connect()->prepare('INSERT INTO client (nomcomplet_p,numerogsm_p,cin_p,nomcomplet_g,numerogsm_g,cin_g,supérficies,cultures,adresse)
			VALUES (:ncp,:nup,:cip,:ncg,:nug,:cig,:su,:cu,:ad)');
		$stmt->bindParam(':ncp',$data['nomcomplet_p']);
		$stmt->bindParam(':nup',$data['numerogsm_p']);
		$stmt->bindParam(':cip',$data['cin_p']);
        $stmt->bindParam(':ncg',$data['nomcomplet_g']);
		$stmt->bindParam(':nug',$data['numerogsm_g']);
		$stmt->bindParam(':cig',$data['cin_g']);
        $stmt->bindParam(':su',$data['supérficies']);
		$stmt->bindParam(':cu',$data['cultures']);
		$stmt->bindParam(':ad',$data['adresse']);

		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	}
	static public function update($data){
		$stmt = DB::connect()->prepare('UPDATE client SET nomcomplet_p=:ncp,numerogsm_p=:nup,cin_p=:cip,nomcomplet_g=:ncg,numerogsm_g=:nug,cin_g=:cig,supérficies=:su,cultures=:cu,adresse=:ad WHERE id_client=:id');
		$stmt->bindParam(':id',$data['id_client']);
		$stmt->bindParam(':ncp',$data['nomcomplet_p']);
		$stmt->bindParam(':nup',$data['numerogsm_p']);
		$stmt->bindParam(':cip',$data['cin_p']);
        $stmt->bindParam(':ncg',$data['nomcomplet_g']);
		$stmt->bindParam(':nug',$data['numerogsm_g']);
		$stmt->bindParam(':cig',$data['cin_g']);
        $stmt->bindParam(':su',$data['supérficies']);
		$stmt->bindParam(':cu',$data['cultures']);
		$stmt->bindParam(':ad',$data['adresse']);
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
			$query = 'DELETE FROM client WHERE id_client=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			if($stmt->execute()){
				return 'ok';
			}
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function searchClient($data){
		$search = $data['search'];
		try{
			$query = 'SELECT * FROM client WHERE nomcomplet_p LIKE ?';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array('%'.$search.'%'));
			$clients = $stmt->fetchAll();
			return $clients;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}
}
