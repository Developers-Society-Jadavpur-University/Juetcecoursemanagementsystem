<?php
/*include '../includes/dbh.inc.php';
//$course_code = $_SESSION['course_code'];
$course_code = 'BETC1923';
$result = mysqli_query($conn, "SELECT department FROM batch_info WHERE course_code='$course_code'");
while($row = mysqli_fetch_assoc($result))
{
   $department = $row['department'];
   
   
}*/

require('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{   
    include '../includes/dbh.inc.php';
    $course_code = 'BETC1923';
    $result = mysqli_query($conn,"SELECT department FROM batch_info WHERE course_code=$course_code");
    while($row = mysqli_fetch_array($result))
    {  
        $department = $row['department'];
    }
    // Logo
    
    $this->Image('../image/julogo.png',85,6,25,25);
    // Arial bold 15
    $this->Ln(22);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(70);
    // Title
    
    $this->Cell(33,10,'Department of'.$department.', Jadavpur University',0,0,'C');
    // Line break
    $this->Ln(8);
    $this->Cell(70);
    $this->Cell(33,10,'Attendance cum Roll Sheet',0,0,'C');
    // Line break
    $this->Ln(20);
    
    
    
    
    
    
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    $this->Cell(50,10,'Generated from Course management system',0,0,'C');
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
}
}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Output();

?>