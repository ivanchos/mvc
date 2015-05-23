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
				// returns object
				$sth=$this->db->prepare("SELECT id, role FROM users WHERE
				login=:login AND password=:password"); 
				// $login=$_POST['login'], $password=$_POST['password']
				$sth->execute(array(
				':login'=>$_POST['login'],
				':password'=>Hash::create('md5',$_POST['password'],HASH_PASSWORD_KEY)
				)); 
	
				$data=$sth->fetch();
				
				$count=$sth->rowCount();
				if ($count>0)
					{
						Session::init();
						Session::set('role', $data['role']);
						Session::set('loggedIn', true);
						header('Location:../dashboard');
					}
				else
					{
						header('Location:../login');
					}
			}
	}
