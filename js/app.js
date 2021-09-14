$(document).ready(function(){
       $.ajax({
             url: "http://localhost/fpadmin3/views/data.php",
             method: "GET",
             success: function(data){
                 console.log(data);
                 var commande =[];
                 var total = [];

                 for(var i in data){
                     commande.push("vente " + data[i].id_commande);
                     total.push(data[i].total);
                 }

                 var chartdata = {
                     labels: commande,
                     datasets : [
                        {
                             label : 'vente total',
                             backgroundColor: 'rgba(200, 200, 200, 0.75)',
                             borderColor: 'rgba(200, 200, 200, 0.75)',
                             hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                             hoverBorderColor: 'rgba(200, 200, 200, 1)',
                             data: total
                        }
                     ]
                 };

                 var ctx = $("#mycanvas");
                 var bargraph = new Chart(ctx,{
                      type: 'line',
                      data: chartdata
                 });

             },
             error: function(data){
                 console.log(data);
             }
       });
});