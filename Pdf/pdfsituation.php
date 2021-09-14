<?php
require "fpdf.php";
include '../database/DB.php';

class myPDF extends FPDF{
    function header(){
        //$this->Image('Fruit Plus',10,6);
        $this->SetFont('Arial','B',14);
        $this->Cell(276,5,'Situation AIN TAOUJDATE',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276,10,'la situation vente crédit de ain taoujdate',0,0,'C');
        $this->Ln(20);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTable(){
        $this->SetFont('Times','B',12);
        $this->Cell(25,10,'Date',1,0,'C');
        $this->Cell(40,10,'BL',1,0,'C');
        $this->Cell(60,10,'Nom et Prénom',1,0,'C');
        $this->Cell(60,10,'Articles',1,0,'C');
        $this->Cell(36,10,'Quantité',1,0,'C');
        $this->Cell(25,10,'Prix',1,0,'C');
        $this->Cell(30,10,'Total',1,0,'C');
        $this->Ln();
    }
    function viewTable(){
        $this->SetFont('Times','B',12);
        $query = 'SELECT * FROM commande WHERE type_payement=:ty';
        $stmt = DB::connect()->prepare($query);
        $stmt->execute(array(":ty" => $_POST['type']));
        $stmt-> execute();
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
        $this->Cell(25,10,$data->date,1,0,'C');
        $this->Cell(40,10,$data->bl,1,0,'C');
        $this->Cell(60,10,$data->nomcomplet,1,0,'C');
        $this->Cell(60,10,$data->article,1,0,'C');
        $this->Cell(36,10,$data->prix,1,0,'C');
        $this->Cell(25,10,$data->quantité,1,0,'C');
        $this->Cell(30,10,$data->total,1,0,'C');
        $this->Ln();
        }
    
    }
    
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable();
$pdf->Output();

?>