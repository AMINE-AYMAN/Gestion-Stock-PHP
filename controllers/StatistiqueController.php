<?php 

class StatistiqueController{

	public function VenteInMonth(){
		$result = Statistique::getVenteInMonth();
		return $result;
	}

	public function getstock(){
		$somme = Statistique::getAll();
		return $somme;
	}

	public function getVenteInDay(){
		$somme = Statistique::getVenteDay();
		return $somme;
	}
	public function getTopClients(){
		$somme = Statistique::getAlll();
		return $somme;
	} 

	public function getDayVentes(){
		$somme = Statistique::getDayVente();
		return $somme;
	} 

	public function getTopArticle(){
		$articles = Statistique::getBestProduct();
		return $articles;
	} 

	
}



?>