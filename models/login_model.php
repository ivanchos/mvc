<?php
class Login_Model extends Model
	{
		public function __construct()
			{
				parent::__construct();
			}
		public function run()
			{
				
				// uses array key (:login, :password) instead array value ($login, $password) because it's a prepared statement in PDO
				$sth=$this->db->prepare("SELECT id FROM users WHERE login=:login AND password=md5(:password)"); // returns object
				$sth->execute(array(
				':login'=>$_POST['login'], ':password'=>$_POST['password']
				)); // $login=$_POST['login'], $password=$_POST['password']
				$data=$sth->fetchAll();
				print_r($data);
			}
	}
?>