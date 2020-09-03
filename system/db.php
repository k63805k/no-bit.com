<?php
	class System_db
	{
                
		private $conn;
		private $res;
		
		public function __construct(){
                        global $config;
			$this->conn = new Mysqli("localhost","root","","karen");
			if($this->conn->connect_errno)
			{
				echo $this->conn->connect_error;
				exit();
			}
		}	
		public function select($data){
			$this->res = $this->conn->query($data);
			return $this;
		}
		public function first(){
			$row = $this->res->fetch_assoc();
                        return $row;
		}
		public function all(){
			$res = array();
			while($row = $this->res->fetch_assoc())
			{
				$res[] = $row;
			}
			return $res;
		}
		public function insert($tbl,$data){
			$keys = array();
			$values = array();
			foreach($data as $key=>$value){
				$keys[] = $key;
				$values[] = $value;
			}
			$keyIn = join(",",$keys);
			$valIn = join("','",$values);
			$this->conn->query("insert into $tbl ($keyIn) values ('$valIn')");
		}
		public function update($tbl,$data,$plc){
			$temp1 = array();
			$temp2 = array();
			foreach($data as $key=>$value){
				$temp1[] = $key."='".$value."'";
			}
			foreach($plc as $key=>$value){
				$temp2[] = $key."='".$value."'"; 
			}
			$arrData = join(",",$temp1);
			$arrPlc = join(",",$temp2);
			$this->conn->query("update $tbl set $arrData where $arrPlc");
		}
		public function deleteRow($tbl,$plc){
			$arrPlc = "";
			foreach($plc as $key=>$value){
				$arrPlc = $key."='".$value."'";
			}
			$this->conn->query("delete from $tbl where $arrPlc");
		}
	}
?>