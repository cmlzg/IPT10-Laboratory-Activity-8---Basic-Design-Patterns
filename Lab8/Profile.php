<?php 

namespace App;

class Profile
{
    private $names;
    private $education;
    private $birthLife;
    private $schoolVision;
    private $schoolBuilding;
    private $staffAndOperations;
    private $reestablishment;

    public function __construct($data = null)
    {
        if (isset($data['personal_information'])) {
            $info = $data['personal_information'];

            $this->names = $info['names']; 
            $this->education = $info['education']; 
            $this->birthLife = $info['birth_life'];
            $this->schoolVision = $info['school_vision'];
            $this->schoolBuilding = $info['school_building']; 
            $this->staffAndOperations = $info['staff_and_operations'];
            $this->reestablishment = $info['reestablishment']; 
        }
    }

    public function getFullName()
    {
        return $this->names['status'] . ' ' . $this->names['first_name'] . ' ' . $this->names['middle_name'] . ' ' . $this->names['last_name'];
    }

    public function getBirthLife()
    {
        return $this->birthLife; 
    }

    public function getEducation()
    {
        return $this->education;
    }

    public function getSchoolVision()
    {
        return $this->schoolVision;
    }

    public function getSchoolBuilding()
    {
        return $this->schoolBuilding;
    }

    public function getStaffAndOperations()
    {
        return $this->staffAndOperations;
    }

    public function getReestablishment()
    {
        return $this->reestablishment;
    }
}
