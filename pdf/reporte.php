<?php

require "fpdf.php";

class PDF extends FPDF
{
}

$Fecha1= $_POST['fecha1'];
$Fecha2= $_POST['fecha2'];

//$Fecha3=date("d-m-Y",strtotime($Fecha1));
//$Fecha4=date("d-m-Y",strtotime($Fecha2));

//DELCARACION DE LA HOJA
$pdf=new PDF('P', 'mm', 'Letter');
$pdf->SetMargins(20, 18);
$pdf->AliasNbPages();
$pdf->AddPage();


//DATOS DEL TITULO
$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 7);
$pdf->Cell(30,25,'',0,0,'C',$pdf->Image('images/logo.png', 20,12, 19));
$pdf->Cell(0, 5, utf8_decode(''), 0, 1, 'L');
$pdf->Cell(0, 5, utf8_decode('COMISIÓN FEDERAL DE ELECTRICIDAD'), 0, 1, 'C');
$pdf->Cell(0, 5, 'Reporte del '.$Fecha1. ' al ' .$Fecha2, 0, 1, 'C');

//DATOS DE CONECCION
mysql_connect("localhost","root","usbw");
mysql_select_db("expedientes");

//MOSTRAMOS LA TABLA
$pdf->Ln();
$pdf->Cell(20, 5, "RPU",1,0, 'C');
$pdf->Cell(25, 5, "Cuenta",1,0, 'C');
$pdf->Cell(55, 5, "Nombre",1,0, 'C');
$pdf->Cell(55, 5, utf8_decode("Dirección"),1,0, 'C');
$pdf->Cell(10, 5, "Tarifa",1,0, 'C');
$pdf->Cell(8, 5, utf8_decode("S.E."),1,1, 'C');


$sql="SELECT * FROM expedientes where FECHA >='$Fecha1' and FECHA <='Fecha2' ";
$rec=mysql_query($sql);
while($row=mysql_fetch_array($rec))
{
	$pdf->Cell(20, 5, $row['RPU'],1,0, 'L');
	$pdf->Cell(25, 5, $row['CUENTA'],1,0, 'L');
	$pdf->Cell(55, 5, $row['NOMBRE'],1,0, 'L');
	$pdf->Cell(55, 5, $row['DIRECCION'],1,0, 'L');
	$pdf->Cell(10, 5, $row['TARIFA'],1,0, 'L');
	$pdf->Cell(8, 5, $row['SUBESTACION'],1,1, 'L');
}




$pdf->Output();
//$pdf->Output("Contrato_".$per_Rut."-".$per_DV.".pdf","D");



?>
