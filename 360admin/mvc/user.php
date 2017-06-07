<?php
include_once('Database.php');
class User extends Database{
	
	protected $user_id = NULL;
	protected $user_full = NULL;
	protected $user_name = NULL;
	protected $user_pass = NULL;
	protected $user_mail = NULL;
	protected $user_level = NULL;
	protected $tai_khoan = NULL;
	protected $mat_khau = NULL;
	
	function __construct(){
		$this->connect();	
	}
	
	public function set_user_id($user_id){
		$this->user_id = $user_id;
	}
	public function get_user_id(){
		return $this->user_id;
	}
	//
	public function set_user_full($user_full){
		$this->user_full = $user_full;
	}
	public function get_user_full(){
		return $this->user_full;
	}
	//
	public function set_user_name($user_name){
		$this->user_name = $user_name;
	}
	public function get_user_name(){
		return $this->user_name;
	}
	//
	public function set_user_pass($user_pass){
		$this->user_pass = $user_pass;
	}
	public function get_user_pass(){
		return $this->user_pass;
	}
	//
	public function set_user_mail($user_mail){
		$this->user_mail = $user_mail;
	}
	public function get_user_mail(){
		return $this->user_mail;
	}
	//
	public function set_user_level($user_level){
		$this->user_level = $user_level;
	}
	public function get_user_level(){
		return $this->user_level;
	}


	public function set_id_thanhvien($user_id){
		$this->id_thanhvien = $id_thanhvien;
	}
	public function set_tai_khoan($user_id){
		$this->tai_khoan = $tai_khoan;
	}
	public function set_mat_khau($user_id){
		$this->mat_khau = $mat_khau;
	}
	public function get_id_thanhvien(){
		return $this->id_thanhvien;
	}
	public function get_tai_khoan(){
		return $this->tai_khoan;
	}
	public function get_mat_khau(){
		return $this->mat_khau;
	}


	
	public function login(){
		
		$sql = "SELECT * FROM thanhvien
				WHERE tai_khoan = '$this->tai_khoan'
				AND mat_khau = '$this->mat_khau'";
		$this->query($sql);
		if($this->num_rows() > 0){
			$_SESSION['tai_khoan'] = $this->tai_khoan;
			$_SESSION['mat_khau'] = $this->mat_khau;
		}
		else{
			return 'login fail';	
		}
	}
	public function add(){
		
		$sql = "SELECT * FROM thanhvien
				WHERE tai_khoan = '$this->tai_khoan'";
		$this->query($sql);
		if($this->num_rows() > 0){
			return 'user exist';
		}
		else{
			$sql = "INSERT INTO thanhvien(tai_khoan, mat_khau)
					VALUES('$this->tai_khoan',
						   '$this->mat_khau');";
			$this->query($sql);	
			
		}
	}
	public function edit(){
		
		$sql = "SELECT * FROM thanhvien
				WHERE tai_khoan = '$this->tai_khoan'
				AND id_thanhvien != $this->id_thanhvien
				";
		$this->query($sql);
		if($this->num_rows() > 0){
			return  'user exist';
		}
		else{
			$sql = "UPDATE thanhvien SET tai_khoan = '$this->tai_khoan',
									 mat_khau = '$this->mat_khau'
					WHERE id_thanhvien = $this->id_thanhvien";
			$this->query($sql);
		}
		
	}
	public function del(){
		$sql = "DELETE FROM thanhvien
				WHERE id_thanhvien = $this->id_thanhvien";
		$this->query($sql);
	}
}



/*$User = new User();
$User->set_user_id(9);
$User->set_user_full('Le Thi B');
$User->set_user_name('admin567');
$User->set_user_pass('233333');
$User->set_user_mail('lethib222222@gmail.com');
$User->set_user_level(2);
$User->edit();
*/

?>