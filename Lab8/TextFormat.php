<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;

class TextFormat implements ProfileFormatter
{
    private $response;

    public function setData($profile)
    {
        
        $output = "Education: " . implode(', ', $profile->getEducation()) . PHP_EOL;
        $output .= "Birth Life: " . $profile->getBirthLife()['birth_event'] . PHP_EOL;
        $output .= "School Vision: " . $profile->getSchoolVision()['vision'] . PHP_EOL;
        $output .= "School Building: " . $profile->getSchoolBuilding()['location'] . PHP_EOL;
        $output .= "Staff and Operations: " . $profile->getStaffAndOperations()['initial_staff'] . PHP_EOL;
        $output .= "Reestablishment: " . $profile->getReestablishment()['new_school'] . PHP_EOL;

        $this->response = $output;
    }

    public function render()
    {
        header('Content-Type: text/plain');
        return $this->response; 
    }
}
