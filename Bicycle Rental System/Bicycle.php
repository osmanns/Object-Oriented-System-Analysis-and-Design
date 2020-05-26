<?php

class Bicycle{
    
    private $IdBicycle;
    private $color;
    private $price;
    private $Model;
    private $Status;
    
   
    public function getBicycle($IdBicycle){
        include'./connection.php';
        $sql = " SELECT * FROM `bicycle` WHERE `IdBicycle` LIKE '$IdBicycle'";
        $stm = $obj->prepare($sql); 
        $stm->execute();   
        $row =$stm->fetch(PDO::FETCH_ASSOC);
          echo "<br><br><br>";
          //echo"<img src=\"Image/".$row['image']."\" height =\"200\" width= \"200\">"."<br>";            
            echo"IDBicycle : ".$row['IdBicycle']."<br>";
            echo"Model : ".$row['Model']."<br>";
            echo"Color : ".$row['color']."<br>";
            echo"Price : ".$row['price']."<br>";
            echo"Status : ".$row['Status']."<br>"."<br>";       
    }
    
    public function getSearchBicycle($color,$price,$Model){
    include'./connection.php';     
    $sql = "SELECT * FROM `bicycle` WHERE `color` LIKE '$color' OR 'price' LIKE '$price' OR 'model' LIKE '$model'";
    $stm= $obj->prepare($sql);
    $stm->execute();
     while($row = $stm->fetch(PDO::FETCH_ASSOC)){
            echo "<br><br><br>";
          //echo"<img src=\"Image/".$row['image']."\" height =\"200\" width= \"200\">"."<br>";            
            echo"IDBicycle : ".$row['IdBicycle']."<br>";
            echo"Model : ".$row['Model']."<br>";
            echo"Color : ".$row['color']."<br>";
            echo"Price : ".$row['price']."<br>";
            echo"Status : ".$row['Status']."<br>"."<br>";            
     
      }    
        
        
    }

    public function SearchBicycle($color,$price,$Model){ 
            getSearchBicycle($color,$price,$Model);
    }
    
    public function SelectBicycle($IdBicycle){            
            $this->IdBicycle = $IdBicycle;
    }    
    public function UpdateStatus($Status){       
   
    include'./connection.php';  
    
    //คำสั่ง update    
    
    $sql = "update bicycle set Status=? where IdBicycle=?"; //คำสั่ง update 
    $stm=$obj->prepare($sql);
    $stm->bindparam("1",$Status);
    $stm->bindparam("2",$this->IdBicycle);    
    $stm->execute();
      
    }
    
 
} // class

  
?>


