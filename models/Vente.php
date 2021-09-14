<?php 

class Vente {

	static public function getAllcash(){
		$stmt = DB::connect()->prepare("SELECT * FROM commande where type_payement='cash'");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}

	static public function getAllcrédit(){
		$stmt = DB::connect()->prepare("SELECT * FROM commande where type_payement='crédit'");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}

	static public function getVente($data){
		$id = $data['id'];
		try{
			$query = 'SELECT * FROM commande WHERE id_commande=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			$vente = $stmt->fetch(PDO::FETCH_OBJ);
			return $vente;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function add($data){
		$stmt = DB::connect()->prepare('INSERT INTO commande (date,type_payement,bl,nomcomplet,article,prix,quantité,total)
		VALUES (:dt,:ty,:b,:nc,:ar,:pr,:qu,:tt)');
		$stmt->bindParam(':dt',$data['date']);
		$stmt->bindParam(':ty',$data['type_payement']);
		$stmt->bindParam(':b',$data['bl']);
		$stmt->bindParam(':nc',$data['nomcomplet']);
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
	
	static public function updateq(){
		$query = 'SELECT * FROM artcile WHERE codebare=:cd';
        $stmt1 = DB::connect()->prepare($query);
        $stmt1->execute(array(":cd" => $_POST['codebare']));
        $stmt1-> execute();
		$data = $stmt1->fetch(PDO::FETCH_OBJ);
       if($data->quantité >= $_POST["quantité"]){
		$stmt = DB::connect()->prepare('UPDATE artcile set quantité=quantité- :qu where codebare=:cd');
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
	}

	static public function update($data){
		$stmt = DB::connect()->prepare('UPDATE commande SET date= :dt,bl=:b,nomcomplet=:nc,article=:ar,prix=:pr,quantité=:qu,total=:tt WHERE id_commande=:id');
		$stmt->bindParam(':id',$data['id_commande']);
		$stmt->bindParam(':dt',$data['date']);
		$stmt->bindParam(':b',$data['bl']);
		$stmt->bindParam(':nc',$data['nomcomplet']);
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
		$id = $data['id_commande'];
		try{
			$query = 'DELETE FROM commande WHERE id_commande=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			if($stmt->execute()){
				return 'ok';
			}
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function searchVente($data){
		$search = $data['search'];
		try{
			$query = "SELECT * FROM commande WHERE nomcomplet LIKE ? or article LIKE ? or date LIKE ?";
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array('%'.$search.'%','%'.$search.'%','%'.$search.'%'));
			$ventes = $stmt->fetchAll();
			return $ventes;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}
}
