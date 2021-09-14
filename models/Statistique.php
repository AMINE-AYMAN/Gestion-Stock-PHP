<?php
class Statistique {

	static public function getVenteInMonth(){
		$stmt = DB::connect()->prepare('SELECT date,article from commande');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}

	static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT SUM(quantité) as "nombre" from artcile');
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
		$stmt = null;
	}

	static public function getAlll(){
		$stmt = DB::connect()->prepare('SELECT count(*),nomcomplet from commande GROUP BY nomcomplet order by count(*) desc LIMIT 3');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}

	static public function getVenteDay(){
		$stmt = DB::connect()->prepare('SELECT COUNT(*) as nombre from commande where date=CURRENT_DATE ');
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
		$stmt = null;
	}

	static public function getDayVente(){
		$stmt = DB::connect()->prepare('SELECT * from commande where date=CURRENT_DATE LIMIT 3');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}

	static public function getBestProduct(){
		$stmt = DB::connect()->prepare('SELECT count(*),article from commande group by article order by count(*) desc limit 3');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}

}

?>