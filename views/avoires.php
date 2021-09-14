<?php 
	if(isset($_POST['find'])){
		$data = new AvoireController();
		$avoires = $data->findAvoires();
	}else{
		$data = new AvoireController();
		$avoires = $data->getAllAvoire();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-12 mx-auto">
			<?php include('./views/includes/alerts.php');?>
			<div class="card">
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>addav" class="btn btn-sm btn-primary mr-2 mb-2">
						<i class="fas fa-plus"></i>
					</a>
					<form method="post" class="float-right mb-2 d-flex flex-row">
    <input type="text" class="form-control" placeholder="Nom et prénom, article..." name="find" aria-label="Input group example" aria-describedby="btnGroupAddon">
  &nbsp;  <button class="input-group-text" id="btnGroupAddon" style="cursor:pointer;"><i class="fas fa-search"></i></button>
  </div>
                    </form>
                    <div class="table-responsive">
                  
					<table class="table table-hover">
					<thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col" class="text-center">Date</th>
                                        <th scope="col" class="text-center">nomcomplet</th>
                                        <th scope="col" class="text-center">Article</th>
                                        <th scope="col" class="text-center">Quantité</th>
                                        <th scope="col" class="text-center">Opérations</th>
                                    </tr>
                                </thead>
								<tbody>
                                     <?php foreach($avoires as $avoire): ?>
                                    <tr>
                                        <td class="text-center"><?php echo $avoire['date']; ?></td>
                                        <td class="text-center"><?php echo $avoire['nomcomplet']; ?></td>
                                        <td class="text-center"><?php echo $avoire['article']; ?></td>
                                        <td class="text-center"><?php echo $avoire['quantité']; ?></td>
                                        <td class="formedit">
                                            <form method="post" action="deleteav" class="mr-2">
                                                 <input type="hidden" name="id" value="<?php echo $avoire['id_avoire']; ?>">
                                                 <button class="forumbtn"><i class="fas fa-trash-alt tm-trash-icon"></i></button>
                                            </form>
                                            <form method="post" action="updateav" class="mr-2">
                                                 <input type="hidden" name="id" value="<?php echo $avoire['id_avoire']; ?>">
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