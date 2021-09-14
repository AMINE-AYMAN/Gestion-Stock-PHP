</section>
  <script type="text/javascript" src="js/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="js/utils.js"></script>
    <script src="js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="js/fullcalendar.min.js"></script>
    <!-- https://fullcalendar.io/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="js/tooplate-scripts.js"></script>

    <script src="/js/app.js"></script>
    <script>
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
                             label : 'Total vente',
                             backgroundColor: 'rgba(255, 0, 0, 0.75)',
                             borderColor: 'rgba(0, 0, 255, 0.75)',
                             hoverBackgroundColor: 'rgba(0, 0, 255, 1)',
                             hoverBorderColor: 'rgba(255, 0, 0, 1)',
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
        function myFunction() {
  var prix = document.getElementById("prix").value;
  var quantité = document.getElementById("quantité").value;
  document.getElementById("total").value = prix * quantité;
}
    </script>
</body>
</html>