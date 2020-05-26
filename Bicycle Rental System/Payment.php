<?php
include'./connection.php';
class Payment{
    
    private $paymethod;
    private $Bill;
    
    
    
    public function SelectMethod($paymenthod){
            $this->paymethod = $paymenthod;
    }
    
    public function getPaymethod(){
            return $this->Bill;
    }
    
    
    
}



?>

