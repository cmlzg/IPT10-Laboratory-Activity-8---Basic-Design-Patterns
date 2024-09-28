<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;
use Fpdf\Fpdf;

class PDFFormat implements ProfileFormatter
{
    private $pdf;

    public function setData($profile)
    {
        $this->pdf = new Fpdf('P', 'mm', 'A4');
        $this->pdf->SetMargins(10, 10, 10);
        $this->pdf->AddPage();
    
        $this->pdf->SetFont('Arial', 'B', 16);
        $this->pdf->Cell(0, 10, 'Profile', 0, 1, 'C');
    
        
        $this->pdf->Ln(10);
    
        
        $imageWidth = 50; 
        $xPosition = ($this->pdf->GetPageWidth() - $imageWidth) / 2;
    
      
        $this->pdf->Image('https://www.auf.edu.ph/home/images/articles/bya.jpg', $xPosition, $this->pdf->GetY(), $imageWidth);
    
        
        $this->pdf->Ln(80); 
    
        $this->pdf->SetFont('Arial', '', 12);
        
        $this->pdf->Cell(40, 10, 'Education:', 0, 0);
        $this->pdf->MultiCell(0, 10, implode(', ', $profile->getEducation()), 0, 'L');
    
        $this->pdf->Cell(40, 10, 'Birth Life:', 0, 0);
        $this->pdf->MultiCell(0, 10, $profile->getBirthLife()['birth_event'], 0, 'L');
    
        $this->pdf->Cell(40, 10, 'School Vision:', 0, 0);
        $this->pdf->MultiCell(0, 10, $profile->getSchoolVision()['vision'], 0, 'L');
    
        $this->pdf->Cell(40, 10, 'School Building:', 0, 0);
        $this->pdf->MultiCell(0, 10, $profile->getSchoolBuilding()['location'], 0, 'L');
    
        $this->pdf->Cell(40, 10, 'Staff and Operations:', 0, 0);
        $this->pdf->MultiCell(0, 10, $profile->getStaffAndOperations()['initial_staff'], 0, 'L');
    
        $this->pdf->Cell(40, 10, 'Reestablishment:', 0, 0);
        $this->pdf->MultiCell(0, 10, $profile->getReestablishment()['new_school'], 0, 'L');
    
        $this->pdf->Ln(10); 
    }
    
    
    public function render()
    {
        
        ob_start();

        
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="profile.pdf"');
        
        
        $this->pdf->Output('I', 'profile.pdf'); 

     
        ob_end_flush(); 
        exit; 
    }
}
