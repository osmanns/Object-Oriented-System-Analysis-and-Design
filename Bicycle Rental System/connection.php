<?php

$dbc='mysql:host=localhost;dbname=rent&sell'; // ชื่อฐานข้อมูล folder ชื่อว่า test
$username='root'; //ชื่อผู้ใช้ ของ localhost
$password=''; //รหัสผ่านผู้ใช้ ของ localhost
try {
    $obj=new PDO($dbc,$username, $password); //สร้างตัวแปร obj ของ ฐานข้อมูล 
  //  echo "เชื่อมต่อสำเร็จ";
} catch (Exception $ex) {
    echo $ex->getMessage();
}


?>

