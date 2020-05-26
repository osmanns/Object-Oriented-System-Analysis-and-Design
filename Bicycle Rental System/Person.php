<?php
Class Person{
	protected $db;

	public $id;
	public $Firstname;
	public $Lastname;
	public $Username;
	public $Password;
	public $Email;
	public $Phone;
	public $Address;
	public $Indenification;

	public function __construct()
	{
		$this->db = Database::getInstance();
	}

	public function checkLogin($u, $p){
		try{
			// ตรวจสอบ
			if($this instanceof Staff){
				// prepare โดยมีการส่งคำสั่ง SQL เป็นค่า parameter
				// SELECT คำสั่งการอ่านข้อมูลจากตาราง
				$stmt = $this->db->prepare("SELECT * FROM staff WHERE Username = :u AND Password=:p");
			}
			else if($this instanceof Customer){
				$stmt = $this->db->prepare("SELECT * FROM customer WHERE Username =  :u AND Password= :p");
			}
			// ส่วนการกำหนดค่า parameter ในส่วนของเครื่องหมาย ? ในคำสั่ง SQL โดย ค่า parameter แรก s คือ แทนที่ตัวแปรชนิด String และค่า parameter ที่ 2 แทนค่าตัวแปรที่เป็นเงื่อนไข
			$stmt->bindparam(":u", $u);
			$stmt->bindparam(":p", $p);
			// คำสั่งประมวลผล
			$stmt->execute();

			// การนับจำนวนแถวใน PDO โดยใช้ rowCount
			if($stmt->rowCount() == 1){
				$i = 0;
					// PDO::FETCH_ASSOC: จะรีเทิร์นเป็น array indexed ของชื่อคอลัมน์
					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
						$data['id'] = $row['id'];
						$data['Username'] = $row['Username'];
						$data['Firstname'] = $row['Firstname'];
						$data['Lastname'] = $row['Lastname'];

						$_SESSION['id'] = $data['id'] ;
						$_SESSION['Username'] = $row['Username'];
						$_SESSION['Firstname'] = $row['Firstname'];
						$_SESSION['Lastname'] = $row['Lastname'];

						if($this instanceof Staff){
							$SESSION['user_type'] = "staff";
						}
						else if ($this instanceof Customer) {
							$SESSION['user_type'] = "customer";
						}
					}
					return $data;
			}
		}
		catch (PDOException $e){
			echo $e->getMessage();
			return false;
		}
	}

}

}
?>
