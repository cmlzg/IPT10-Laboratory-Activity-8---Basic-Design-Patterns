<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;

class HTMLFormat implements ProfileFormatter
{
    private $response;

    public function setData($profile)
    {
        $output = "<div style='font-family: Arial, sans-serif; margin: 20px;'>";
        $output .= "<h1 style='color: #2c3e50;'>" . htmlspecialchars($profile->getFullName()) . "</h1>";
        
        
        $output .= "<div style='text-align: center;'>";
        $output .= "<img src='https://www.auf.edu.ph/home/images/articles/bya.jpg' alt='Profile Image' style='max-width:100%; height:auto; border-radius: 8px;'>";
        $output .= "</div>";

        
        $birthLife = $profile->getBirthLife();
        $output .= "<h2 style='color: #2980b9;'>Birth Life</h2>";
        $output .= "<p>" . nl2br(htmlspecialchars($birthLife['birth_event'])) . "</p>";
        $output .= "<p>" . nl2br(htmlspecialchars($birthLife['early_life'])) . "</p>";

        
        $output .= "<h2 style='color: #2980b9;'>Education</h2><ul style='list-style-type: square;'>";
        foreach ($profile->getEducation() as $item) {
            $output .= "<li>" . nl2br(htmlspecialchars($item)) . "</li>";
        }
        $output .= "</ul>";

        
        $schoolVision = $profile->getSchoolVision();
        $output .= "<h2 style='color: #2980b9;'>School Vision</h2>";
        $output .= "<p>" . nl2br(htmlspecialchars($schoolVision['vision'])) . "</p>";
        $output .= "<p>" . nl2br(htmlspecialchars($schoolVision['achievement'])) . "</p>";

        
        $schoolBuilding = $profile->getSchoolBuilding();
        $output .= "<h2 style='color: #2980b9;'>School Building</h2>";
        $output .= "<p><strong>Location:</strong> " . htmlspecialchars($schoolBuilding['location']) . "</p>";
        $output .= "<p><strong>Structure:</strong> " . nl2br(htmlspecialchars($schoolBuilding['structure'])) . "</p>";

        
        $staffAndOperations = $profile->getStaffAndOperations();
        $output .= "<h2 style='color: #2980b9;'>Staff and Operations</h2>";
        $output .= "<p>" . nl2br(htmlspecialchars($staffAndOperations['initial_staff'])) . "</p>";

        
        $reestablishment = $profile->getReestablishment();
        $output .= "<h2 style='color: #2980b9;'>Reestablishment</h2>";
        $output .= "<p>" . nl2br(htmlspecialchars($reestablishment['new_school'])) . "</p>";

        $output .= "</div>";
        $this->response = $output;
    }

    public function render()
    {
        return $this->response;
    }
}
