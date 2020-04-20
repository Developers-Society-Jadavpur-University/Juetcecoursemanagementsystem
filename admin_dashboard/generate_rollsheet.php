<?php

require('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{   
    // Logo
    
    $this->Image('../image/julogo.png',90,6,25,25);
    // Arial bold 15
    $this->Ln(22);
    $this->SetFont('Arial','B',10);
    // Move to the right
    $this->Cell(78);
    // Title
    
    include '../includes/dbh.inc.php';
    session_start();
    $course_code = $_SESSION['course_code'];
    
    $result = mysqli_query($conn, "SELECT department FROM batch_info WHERE course_code='$course_code'");
    while($row = mysqli_fetch_assoc($result))
      {
          
          $this->Cell(34,10,'Department of '.$row['department'].', Jadavpur University',0,0,'C');
       }
    
    //$this->Cell(33,10,'Department of'.$department.', Jadavpur University',0,0,'C');
    // Line break
    $this->Ln(5);
    $this->Cell(78);
    $this->Cell(33,10,'Attendance cum Roll Sheet',0,0,'C');
    
    $this->Ln(10);
    $this->Cell(1);

    $result = mysqli_query($conn, "SELECT * FROM batch_info WHERE course_code='$course_code'");
    while($row = mysqli_fetch_assoc($result))
      {
          
          $this->Cell(34,10,'BATCH : '.$row['course_name'].' '.$row['start_year'].' '.'to'.' '.$row['end_year'].' '.'batch',0,0,'L');
    }

    // Line break
    $this->Ln(13);
    
    
    
    
    
    
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
function headerTable()
{
  $this->SetFont('Arial','B',10);
  $this->Cell(35,06,'Roll No',1,0,'C');
  $this->Cell(65,06,'Name',1,0,'C');
  $this->Cell(07,06,'',1,0,'C');
  $this->Cell(07,06,'',1,0,'C');
  $this->Cell(07,06,'',1,0,'C');
  $this->Cell(07,06,'',1,0,'C');
  $this->Cell(07,06,'',1,0,'C');
  $this->Cell(07,06,'',1,0,'C');
  $this->Cell(07,06,'',1,0,'C');
  $this->Cell(07,06,'',1,0,'C');
  $this->Cell(07,06,'',1,0,'C');
  $this->Cell(07,06,'',1,0,'C');
  $this->Cell(07,06,'',1,0,'C');
  $this->Cell(07,06,'',1,0,'C');
  $this->Ln();



}
function ViewData()
{   include '../includes/dbh.inc.php';
    session_start();
    $course_code = $_SESSION['course_code'];
    $result = mysqli_query($conn, "SELECT roll_no,Full_name FROM student_userdata WHERE course_code='$course_code'");
    while($row = mysqli_fetch_assoc($result))
    {
        $this->SetFont('Arial','',10);
        $this->Cell(35,06,$row['roll_no'],1,0,'L');
        $this->Cell(65,06,$row['Full_name'],1,0,'L');
        $this->Cell(07,06,'',1,0,'C');
        $this->Cell(07,06,'',1,0,'C');
        $this->Cell(07,06,'',1,0,'C');
        $this->Cell(07,06,'',1,0,'C');
        $this->Cell(07,06,'',1,0,'C');
        $this->Cell(07,06,'',1,0,'C');
        $this->Cell(07,06,'',1,0,'C');
        $this->Cell(07,06,'',1,0,'C');
        $this->Cell(07,06,'',1,0,'C');
        $this->Cell(07,06,'',1,0,'C');
        $this->Cell(07,06,'',1,0,'C');
        $this->Cell(07,06,'',1,0,'C');
        $this->Ln();          
          
    }
}
}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->headerTable();
$pdf->ViewData();
$pdf->SetFont('Times','',12);
$pdf->Output();

?>