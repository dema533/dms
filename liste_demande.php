<?php 
require "db.php";
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
    // $this->Image('logo.png',10,6,30);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(50);
    // Titre
    $this->Cell(60,10,'Liste des demandes',1,0,'C');
    // Saut de ligne
    $this->Ln(20);
    $this->Write(5,"------------------------------------");
    $this->Ln(7);
}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$query="SELECT * FROM `demandes`";
$stmt = $conn->prepare($query);
$stmt->execute();
$demandes = $stmt->fetchAll();

$table =[];
$i=0;
if ($demandes) {
    for($i=0;$i<=3;$i++)
    foreach ($demandes as  $row) {
         $pdf->Cell(0,7,utf8_decode('Reference : '. $row['reference']),0,1);
         $pdf->Cell(0,7,utf8_decode('Intention : '. $row['type']),0,1);
         $pdf->Cell(0,7,utf8_decode('Date : '. $row['dates'].' à'.$row['heure'] ),0,1);
         $pdf->Cell(0,7,utf8_decode('Lieu : '. $row['localite']),0,1);
         $pdf->Cell(0,7,utf8_decode('Message éventuel : '),0,1);
         $pdf->Cell(0,7,utf8_decode($row['containt']),0,1);
         $pdf->Cell(0,7,utf8_decode('Demandeur : '. $row['demandeur']),0,1);
         $pdf->Cell(0,7,utf8_decode('Paroisse : '. $row['paroisse']),0,1);
         $pdf->Cell(0,7,utf8_decode('De ou pour (NOM/Prénom) : -------------------------'),0,1);
         $pdf->Ln(2);
         $pdf->Output();
        }
    $pdf->Write(10,"_____________________________________________________________________________");
    // $table = array_chunk($row,3,true);
  

   
}

?>