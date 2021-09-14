<?php 
	if(isset($_POST['find'])){
		$data = new ClientController();
		$clients = $data->findClients();
	}else{
		$data = new ClientController();
		$clients = $data->getAllClient();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-12 mx-auto">
			<?php include('./views/includes/alerts.php');?>
			<div class="card">
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>addcl" class="btn btn-sm btn-primary mr-2 mb-2">
						<i class="fas fa-plus"></i>
					</a>
					<form method="post" class="float-right mb-2 d-flex flex-row">
    <input type="text" class="form-control" placeholder="Nom et prénom..." name="find" aria-label="Input group example" aria-describedby="btnGroupAddon">
  &nbsp;  <button class="input-group-text" id="btnGroupAddon" style="cursor:pointer;"><i class="fas fa-search"></i></button>
  </div>
                    </form>
                    <div class="table-responsive">
                   
					<table class="table table-hover">
					<thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col" class="text-center">Nom et Prénom proprietaire</th>
                                        <th scope="col" class="text-center">Numero GSM</th>
                                        <th scope="col" class="text-center">CIN</th>
                                        <th scope="col" class="text-center">Nom et Prénom gérant</th>
                                        <th scope="col" class="text-center">Numero GSM</th>
                                        <th scope="col" class="text-center">CIN</th>
                                        <th scope="col" class="text-center">Supérficies</th>
                                        <th scope="col" class="text-center">Cultures GSM</th>
                                        <th scope="col" class="text-center">Adresse</th>
                                        <th scope="col" class="text-center">Opérations</th>
                                    </tr>
                                </thead>
								<tbody>
                                     <?php foreach($clients as $client): ?>
                                    <tr>
                                        <td class="text-center"><?php echo $client['nomcomplet_p']; ?></td>
                                        <td class="text-center"><?php echo $client['numerogsm_p']; ?></td>
                                        <td class="text-center"><?php echo $client['cin_p']; ?></td>
                                        <td class="text-center"><?php echo $client['nomcomplet_g']; ?></td>
                                        <td class="text-center"><?php echo $client['numerogsm_g']; ?></td>
                                        <td class="text-center"><?php echo $client['cin_g']; ?></td>
                                        <td class="text-center"><?php echo $client['supérficies']; ?></td>
                                        <td class="text-center"><?php echo $client['cultures']; ?></td>
                                        <td class="text-center"><?php echo $client['adresse']; ?></td>
                                        <td class="formedit">
                                            <form method="post" action="deletecl" class="mr-2">
                                                 <input type="hidden" name="id" value="<?php echo $client['id_client']; ?>">
                                                 <button class="forumbtn"><i class="fas fa-trash-alt tm-trash-icon"></i></button>
                                            </form>
                                            <form method="post" action="updatecl" class="mr-2">
                                                 <input type="hidden" name="id" value="<?php echo $client['id_client']; ?>">
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