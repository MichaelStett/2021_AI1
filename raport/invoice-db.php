<?php
require('fpdf17/fpdf.php');
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'arturino');

$query=mysqli_query($con,"SELECT * FROM `invoicesale` inner join contractor ORDER BY `countinvoice` DESC
");
//select * from invoicesale  where invoiceNumber = '".$_GET['invoiceNumber']."'");
$invoice=mysqli_fetch_array($query);
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(130	,5,'Arturino Co.',0,0);
$pdf->Cell(59	,5,'INVOICE',0,1);//end of line
$pdf->SetFont('Arial','',12);
$pdf->Cell(130	,5,'Zolnierska 44',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line
$pdf->Cell(130	,5,'Szczecin,Poland',0,0);
$pdf->Cell(25	,5,'Date:',0,0);
$pdf->Cell(34	,5,$invoice['addDate'],0,1);//end of line
$pdf->Cell(130	,5,'Phone: +000 111 121',0,0);
$pdf->Cell(25	,5,'INVnumber',0,0);
$pdf->Cell(34	,5,$invoice['invoiceNumber'],0,1);//end of line
$pdf->Cell(130	,5,'Fax : 00000000000111112222233333',0,0);
$pdf->Cell(25	,5,'Customer ID',0,0);
$pdf->Cell(34	,5,$invoice['vatID'],0,1);//end of line
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->Cell(100	,5,'Bill to',0,1);//end of line
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice['name'],0,1);
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->SetFont('Arial','B',12);
$pdf->Cell(130	,5,'Description',1,0);
$pdf->Cell(25	,5,'amountTax',1,0);
$pdf->Cell(34	,5,'amountGross',1,1);//end of line
$pdf->SetFont('Arial','',12);
$query=mysqli_query($con,"select * from invoicesale where id = '".$invoice['id']."'");
$tax=0;
$amount=0;
while($item=mysqli_fetch_array($query)){
	$pdf->Cell(130	,5,$item['invoiceNumber'],1,0);
	$pdf->Cell(25	,5,number_format($item['amountTax']),1,0);
	$pdf->Cell(34	,5,number_format($item['amountGross']),1,1,'R');//end of line
	$tax+=$item['amountTax'];
	$amount+=$item['amountGross'];
}
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Subtotal',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,number_format($amount),1,1,'R');//end of line
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'amountTax',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,number_format($tax),1,1,'R');//end of line
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Tax Rate',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,'10%',1,1,'R');//end of line
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Total Due',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,number_format($amount - $tax),1,1,'R');//end of line
$pdf->Output();
?>
