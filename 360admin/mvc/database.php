<?php
class Database{
	protected $db_host = 'localhost';
	protected $db_user = 'root';
	protected $db_pass = '';
	protected $db_name = '360shop';
	
	protected $row = NULL;
	protected $rows = NULL;
	protected $conn = NULL;
	protected $result = NULL;
	
	public function connect(){
		
		$this->conn = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
		if($this->conn){
			mysqli_query($this->conn, "SET NAMES 'utf8'");
		}
		else{
			echo 'Ket noi that bai!';
		}
	}
	
	public function free_result(){
		
		if($this->result){
			mysqli_free_result($this->result);
		}	
	}
	
	public function query($sql){
		
		$this->free_result();
		$this->result = mysqli_query($this->conn, $sql);
	}
	
	public function num_rows(){

		if($this->result){
			$this->rows = mysqli_num_rows($this->result);
		}
		return $this->rows;
	}
	
	public function fetch_row(){
		
		if($this->result){
			/*
			trả về một mảng hỗn hợp cả nguyên và kết hợp
			*/
			$this->row = mysqli_fetch_array($this->result);
			
			/*
			Trả về một mảng kết hợp (key là tên cột)
			mysqli_fetch_assoc();
			
			Trả về một mảng nguyên (key là các số nguyên bắt đầu từ 0)
			mysqli_fetch_row();
			
			trả về một mảng đối tượng
			mysqli_fetch_object();
			*/
		}
		return $this->row;
	}	
}

/*$Database = new Database();
$Database->connect();
$sql = "SELECT * FROM users";
$Database->query($sql);
$row = $Database->fetch_row();
echo '<pre>';

print_r($row);

echo '</pre>';

while($row = $Database->fetch_row()){
	//echo $row['user_full'].'<br/>';
	echo $row->user_full.'<br/>';
}*/


?>