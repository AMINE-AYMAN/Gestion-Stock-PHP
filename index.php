<?php 
require_once './views/includes/header.php';
require_once './autoload.php';
require_once './controllers/HomeController.php';


$home = new HomeController();

$pages = ['articles','adda','updatea','deletea','logout','login','register','vente','ventes','addv','updatev','deletev','statistiques','stock2020','adds','updates','deletes','charges','addc','updatec','deletec','ventemagasin','addvm','updatevm','deletevm','avoires','addav','updateav','deleteav','bulmests','addb','updateb','deleteb','clients','addcl','updatecl','deletecl'];

if(isset($_SESSION['logged']) && $_SESSION['logged'] === true){
	if(isset($_GET['page'])){
		if(in_array($_GET['page'],$pages)){
			$page = $_GET['page'];
			$home->index($page);
		}else{
			include('views/includes/404.php');
		}
	}else{
		$home->index('statistiques');
	}


require_once './views/includes/footer.php';


}else{
	$home->index('login');
}