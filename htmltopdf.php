<?php

require('fpdf.php');
class mypdf extends FPDF 
{
     function header()
     {
          $this->Image('logo.jpg',10,2);
          $this->SetFont('Arial','B',14);
          $this->Cell(276,5,'Employe documents',0,0,'C');
          $this->ln();
     }
      
     function footer()
     {
         $this->SetY(-15);
        
          $this->SetFont('Arial','B',14);
          $this->Cell(276,5,'Employe documents',0,0,'C');
          
     }
}
$page= file_get_contents("http://localhost/gesnote/cal.php");

//var_dump($page);
$pdf = new mypdf();
$pdf->AddPage('L','A4',0);
$pdf->SetFont('Arial','B',14);
$text= " bonjour chers amis";
$pdf->Cell(10,120,$page);
$pdf->Output();
?>