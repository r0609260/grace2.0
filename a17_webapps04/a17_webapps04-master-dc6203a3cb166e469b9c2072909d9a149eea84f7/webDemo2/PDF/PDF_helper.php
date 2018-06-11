<?php
var_dump(getcwd());
require('PDF/fpdf.php');
include('PDF/qrlib.php');

class PDFHelper extends FPDF{
// Page header
function Header()
{
    // Logo
    $this->Image('Header.JPG',10,10,190);
    $this->Image('johndoe.jpg', 80,30,50);              //FILL IN IMAGE OF PERSON
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    $this->Cell(0,155,'John Doe',0,1,'C');                 //FILL IN NAME OF PERSON
    $this->Ln(-70);
    $this->Cell(0,0,'De Zonnebloem',0,1,'C');           // FILL IN SECTOR OF PERSON
    $this->Ln(8);
    $this->Cell(0,0,'Kamer/Room 2',0,1,'C');            // FILL IN ROOM OF PERSON
    $this->Line(10, 110, 200, 110);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
function getPDF() {
    var_dump("Got in PDF");
    $svgCode = QRcode::png('The ID of the Resident','qr1.png'); // FILL IN ID OF PERSON (=key of QR)
    $svgCode = QRcode::png('The ID of the Resident','qr2.png'); // FILL IN ID OF FAMILY


    // Instanciation of inherited class
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',12);
    $pdf->SetFont('Arial','B',15);
    $pdf->Ln(32);
    $pdf->Cell(0,0,'QR Code For John Doe:',0,1,'C'); // FILL IN: "QR Code For {name}
    $pdf->Image('qr1.png',80,140,50);
    unlink('qr1.png');
    $pdf->Ln(80);
    $pdf->Cell(0,0,'QR Code For Family:',0,1,'C');
    $pdf->Image('qr2.png',80,220,50);
    unlink('qr2.png');
    $pdf->Output('D');
}
}