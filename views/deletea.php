<?php 
	if(isset($_POST['id'])){
		$exitArticle = new ArticleController();
		$exitArticle->deleteArticle();
	}
?>