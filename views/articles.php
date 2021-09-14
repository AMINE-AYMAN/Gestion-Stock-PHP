<?php 
	if(isset($_POST['find'])){
		$data = new ArticleController();
		$articles = $data->findArticles();
	}else{
		$data = new ArticleController();
		$articles = $data->getAllArticle();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-12 mx-auto">
			<?php include('./views/includes/alerts.php');?>
			<div class="card">
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>adda" class="btn btn-sm btn-primary mr-2 mb-2">
						<i class="fas fa-plus"></i>
					</a>
					<form method="post" class="float-right mb-2 d-flex flex-row">
    <input type="text" class="form-control" placeholder="Date, Article, Prix..." name="find" aria-label="Input group example" aria-describedby="btnGroupAddon">
  &nbsp;  <button class="input-group-text" id="btnGroupAddon" style="cursor:pointer;"><i class="fas fa-search"></i></button>
  </div>
                    </form>
                    <div class="table-responsive">
                    <div class="form-inline div-pdf-excel">
                            <label>Export :</label>&nbsp;&nbsp;
                            <form method="post" action="Pdf/pdfsituation.php">
                            <button name="pdf" class="btn btn-sm btn-secondary btn-pdf">PDF <i class="fas fa-file-pdf"></i></button>&nbsp;&nbsp;
                            </form>
                            <form action="Excel/Excelstituation.php" method="post">
                            <button name="excelcom" class="btn btn-sm btn-secondary btn-excel">EXCEL <i class="fas fa-file-excel"></i></button>
                            </form>    
                        </div>
					<table class="table table-hover">
					<thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col" class="text-center">Articles</th>
                                        <th scope="col" class="text-center">Prix vente</th>
                                        <th scope="col" class="text-center">Magasin</th>
                                        <th scope="col" class="text-center">Fournisseurs</th>
                                        <th scope="col" class="text-center">Date ajoute</th>
                                        <th scope="col" class="text-center">Quantité</th>
                                        <th scope="col" class="text-center">Opérations</th>
                                    </tr>
                                </thead>
								<tbody>
                                     <?php foreach($articles as $article): ?>
                                    <tr>
                                        <td class="text-center"><?php echo $article['descriptionn']; ?></td>
                                        <td class="text-center"><?php echo $article['prix']; ?></td>
                                        <td class="text-center"><?php echo $article['magasin']; ?></td>
                                        <td class="text-center"><?php echo $article['fournisseurs']; ?></td>
                                        <td class="text-center"><?php echo $article['dateajoute']; ?></td>
                                        <td class="text-center">
						      	<?php if($article['quantité']>10) {?>
                                             <span class="badge badge-success"><?php echo $article['quantité']; ?></span>
						      	<?php } else{?>
                                         <span class="badge badge-danger"><?php echo $article['quantité']; ?></span>
                                         <?php } ?>
						          </td>
                                        <td class="formedit">
                                            <form method="post" action="deletea" class="mr-2">
                                                 <input type="hidden" name="id" value="<?php echo $article['id_article']; ?>">
                                                 <button class="forumbtn"><i class="fas fa-trash-alt tm-trash-icon"></i></button>
                                            </form>
                                            <form method="post" action="updatea" class="mr-2">
                                                 <input type="hidden" name="id" value="<?php echo $article['id_article']; ?>">
                                                 <button class="forumbtn"><i class="fas fa-edit"></i></button>
                                            </form>
                                       </td>
                                    </tr>
                                   <?php endforeach; ?>
                                </tbody>
					</table>
                    </div>
				</div>
			</div>
		</div>
	</div>
    </div>