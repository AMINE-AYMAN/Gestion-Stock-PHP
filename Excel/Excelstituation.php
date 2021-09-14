<?php

include '../database/DB.php';

$query = 'SELECT date,bl,nomcomplet,article,prix,quantité,total FROM commande where type_payement=:ty';
$stmt = DB::connect()->prepare($query);
$stmt->execute(array(":ty" => $_POST['type']));
$stmt-> execute();
$vente = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Check the export button is pressed or not
if(isset($_POST["excelcom"])) {
//Define the filename with current date
$fileName = "Vente.xls";

//Set header information to export data in excel format
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename='.$fileName);

//Set variable to false for heading
$heading = false;

//Add the MySQL table data to excel file
if(!empty($vente)) {
foreach($vente as $v) {
if(!$heading) {
echo implode("\t", array_keys($v)) . "\n";
$heading = true;
}
echo implode("\t", array_values($v)) . "\n";
}
}
exit();
}

?>