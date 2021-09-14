<?php 

class Article {

	static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT * FROM artcile');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}

	static public function getArticle($data){
		$id = $data['id'];
		try{
			$query = 'SELECT * FROM artcile WHERE id_article=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			$article = $stmt->fetch(PDO::FETCH_OBJ);
			return $article;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function add($data){
		$stmt = DB::connect()->prepare('INSERT INTO artcile (descriptionn,prix,dateajoute,quantité,magasin,fournisseurs,codebare)
			VALUES (:descr,:pr,:dt,:qu,:mg,:fr,:cd)');
		$stmt->bindParam(':descr',$data['descriptionn']);
		$stmt->bindParam(':pr',$data['prix']);
		$stmt->bindParam(':dt',$data['dateajoute']);
		$stmt->bindParam(':qu',$data['quantité']);
		$stmt->bindParam(':mg',$data['magasin']);
		$stmt->bindParam(':fr',$data['fournisseurs']);
		$stmt->bindParam(':cd',$data['codebare']);
		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	}
	static public function update($data){
		$stmt = DB::connect()->prepare('UPDATE artcile SET descriptionn=:de,prix=:pr,dateajoute=:dt,quantité=:qu,magasin=:mg,fournisseurs=:fr WHERE id_article=:id');
		$stmt->bindParam(':id',$data['id_article']);
		$stmt->bindParam(':de',$data['descriptionn']);
		$stmt->bindParam(':pr',$data['prix']);
		$stmt->bindParam(':dt',$data['dateajoute']);
		$stmt->bindParam(':qu',$data['quantité']);
		$stmt->bindParam(':mg',$data['magasin']);
		$stmt->bindParam(':fr',$data['fournisseurs']);
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
			$query = 'DELETE FROM artcile WHERE id_article=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			if($stmt->execute()){
				return 'ok';
			}
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function searchArticle($data){
		$search = $data['search'];
		try{
			$query = 'SELECT * FROM artcile WHERE descriptionn LIKE ? or magasin LIKE ? or fournisseurs LIKE ? or quantité LIKE ? or dateajoute LIKE ? or codebare LIKE ?';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array('%'.$search.'%','%'.$search.'%','%'.$search.'%','%'.$search.'%','%'.$search.'%','%'.$search.'%'));
			$articles = $stmt->fetchAll();
			return $articles;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}
}
