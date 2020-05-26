<?php

include_once 'Person.php';

class Customer extends Person{
    
    private $IDCustomer;
   
    public function getID(){        
        return $this->IDCustomer;
    }
        
}// class


?>

