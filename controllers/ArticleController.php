<?php 

class ArticleController{

	public function getAllArticle(){
		$articles = Article::getAll();
		return $articles;
	}

	public function getOneArticle(){
		if(isset($_POST['id'])){
			$data = array(
				'id' => $_POST['id']
			);
			$article = Article::getArticle($data);
			return $article;
		}
	}
	public function findArticles(){
		if(isset($_POST['find'])){
			$data = array('search' => $_POST['find']);
		}
		$articles = Article::searchArticle($data);
		return $articles;
	} 

	public function addArticle(){
		if(isset($_POST['addarticle'])){
			$data = array(
				'descriptionn' => $_POST['descriptionn'],
                'prix' => $_POST['prix'],
                'dateajoute' => $_POST['dateajoute'],
                'quantité' => $_POST['quantité'],
                'magasin' => $_POST['magasin'],
                'fournisseurs' => $_POST['fournisseurs'],
				'codebare' => $_POST['codebare'],
			);
			$result = Article::add($data);
			if($result === 'ok'){
				Session::set('success','Article Ajouté');
				Redirect::to('articles');
			}else{
				echo $result;
			}
		}
	}

	public function updateArticle(){
		if(isset($_POST['submit'])){
			$data = array(
				'id_article' => $_POST['id'],
				'descriptionn' => $_POST['descriptionn'],
				'prix' => $_POST['prix'],
				'dateajoute' => $_POST['dateajoute'],
				'quantité' => $_POST['quantité'],
				'magasin' => $_POST['magasin'],
				'fournisseurs' => $_POST['fournisseurs'],
			);
			$result = Article::update($data);
			if($result === 'ok'){
				Session::set('success','Article Modifié');
				Redirect::to('articles');
			}else{
				echo $result;
			}
		}
	}
	public function deleteArticle(){
		if(isset($_POST['id'])){
			$data['id'] = $_POST['id'];
			$result = Article::delete($data);
			if($result === 'ok'){
				Session::set('success','Article Supprimé');
				Redirect::to('articles');
			}else{
				echo $result;
			}
		}
	}

}



?>