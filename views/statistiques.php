<?php
     $data = new StatistiqueController();
     $stocks = $data->getstock();
     $ventes = $data->getVenteInDay();
     $clients = $data->getTopClients();
     $vente = $data->getDayVentes();
     $articles = $data->getTopArticle();
     $result = $data->VenteInMonth();
?>
<div class="container divmain">
    <div class="row mt-4">

    <div class="d-flex flex-row">
           
           <div class="card mr-4 ml-4 divst">
                <div class="card-header cardtext">
                     Vente par mois
                </div>
              <div class="card-body">
              <canvas id="mycanvas"></canvas>
              
              </div>
           </div>

          <div class="card mr-4 ml-4 divst">
          <div class="card-header cardtext">
                      Nombre de vente aujourd'hui
                      </div>
          <div class="card-body">
          
          <h5 class="text-center"><?php echo $ventes['nombre']; ?></h5>
                 </div>
           </div>
           <div class="card mr-4 ml-4 divst">
                  <div class="card-header cardtext">
                            Liste des Clients plus active
                   </div>
                <div class="card-body">
                <?php foreach($clients as $client): ?>
                   <h5 class="text-center"><?php echo $client["nomcomplet"]; ?></h5>
                <?php endforeach; ?>
                 </div>
             </div>
         

        </div>

         <div class="d-flex flex-row">

             <div class="card mr-4 ml-4 divst">
                  <div class="card-header cardtext">
                        Les Produits plus vendu
                  </div>
                <div class="card-body">
                <?php foreach($articles as $article): ?>
                   <h5 class="text-center"><?php echo $article["article"]; ?></h5>
                <?php endforeach; ?>
                </div>
             </div>

            <div class="card mr-4 ml-4 divst">
                  <div class="card-header cardtext">
                            Vente d'aujourd-hui | <?php echo date("d/m/y"); ?>
                   </div>
                <div class="card-body">
                <?php foreach($vente as $v): ?>
                <h5 class="text-center"><?php echo $v["article"]; ?></h5>
                <?php endforeach; ?>
                 </div>
             </div>
             <div class="card mr-4 ml-4 divst">
          <div class="card-header cardtext">
                      Nombre des articles en stock
                      </div>
          <div class="card-body">
          
                      <h5 class="text-center"><?php echo $stocks['nombre']; ?></h5>
                 </div>
           </div>
 

          </div>


    
    <div style="display:none;"><canvas id="pieChart" class="chartjs-render-monitor"></canvas>
  
    <canvas id="barChart"></canvas></div> 
</div> 
</div>


