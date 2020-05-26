<?php
include_once 'Person.php';

class Staff extends Person{
    
    private $IDStaff;
   
    public function getID(){        
        return $this->IDStaff;
    }
        
}// class


?>