<?php 
	if(isset($_POST['find'])){
		$data = new BulmestController();
		$bulmests = $data->findBulmests();
	}else{
		$data = new BulmestController();
		$bulmests = $data->getAllBulmest();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-12 mx-auto">
			<?php include('./views/includes/alerts.php');?>
			<div class="card">
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>addb" class="btn btn-sm btn-primary mr-2 mb-2">
						<i class="fas fa-plus"></i>
					</a>
					<form method="post" class="float-right mb-2 d-flex flex-row">
    <input type="text" class="form-control" placeholder="article, date ..." name="find" aria-label="Input group example" aria-describedby="btnGroupAddon">
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
                                        <th scope="col" class="text-center">Date</th>
                                        <th scope="col" class="text-center">Article</th>
                                        <th scope="col" class="text-center">Prix</th>
                                        <th scope="col" class="text-center">Quantit??</th>
                                        <th scope="col" class="text-center">Total</th>
                                        <th scope="col" class="text-center">Op??rations</th>
                                    </tr>
                                </thead>
								<tbody>
                                     <?php foreach($bulmests as $bulmest): ?>
                                    <tr>
                                        <td class="text-center"><?php echo $bulmest['date']; ?></td>
                                        <td class="text-center"><?php echo $bulmest['article']; ?></td>
                                        <td class="text-center"><?php echo $bulmest['prix']; ?></td>
                                        <td class="text-center"><?php echo $bulmest['quantit??']; ?></td>
                                        <td class="text-center"><?php echo $bulmest['total']; ?></td>
                                        <td class="formedit">
                                            <form method="post" action="deleteb" class="mr-2">
                                                 <input type="hidden" name="id" value="<?php echo $bulmest['id_bulmest']; ?>">
                                                 <button class="forumbtn"><i class="fas fa-trash-alt tm-trash-icon"></i></button>
                                            </form>
                                            <form method="post" action="updateb" class="mr-2">
                                                 <input type="hidden" name="id" value="<?php echo $bulmest['id_bulmest']; ?>">
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