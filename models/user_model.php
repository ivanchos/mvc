<?php
class User_Model extends Model
	{
		public function __construct()
			{
				parent::__construct();
			}
		public function userList()
			{
				return $this->db->select('SELECT userid, login, role FROM users');
			}
		public function userSingleList($userid)
			{
				return $this->db->select('SELECT userid, login, role FROM users WHERE userid=:userid', array(':userid'=>$userid));
			}
		public function create($data)
			{
				$this->db->insert('users', array(
					'login'=>$data['login'],
					'password'=>Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
					'role'=>$data['role']
					));
				/*
				$sth = $this->db->prepare('INSERT INTO users 
					(login, password, role) 
					VALUES (:login, :password, :role)
					');
				$sth->execute(array(
					':login'=>$data['login'],
					':password'=>hash::create('md5',$_POST['password'],HASH_PASSWORD_KEY),
					':role'=>$data['role']
					));
				*/
			}
		public function editSave($data)
			{
				$postData=array(
					'login'=>$data['login'],
					'password'=>Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
					'role'=>$data['role']
					);
				$this->db->update('users', $postData, "userid={$data['userid']}");
			}
		public function delete($userid)
			{
				$result=$this->db->select('SELECT role FROM users WHERE userid=:userid', array(':userid'=>$userid));
				
				/*
				returns multidimensional array because role is array with values (default, admin, owner)
				Array ( [0] => Array ( [role] => default ) )
				Array ( [1] => Array ( [role] => default ) )
				Array ( [2] => Array ( [role] => default ) )
				...
				
				it's only one element for chosen $id, so that's why its index is [0] and $result[0]
				Array ( [0] => Array ( [role] => default ) )
				
				also:
				change $this->user['userid'] into $this->user[0]['userid']
				change $this->user['login'] into $this->user[0]['login']
				change $this->user['role'] into $this->user[0]['role']
				in views/user/edit.php
				*/
				if ($result[0]['role']=='owner')
					{
						return false;
					}
				$this->db->delete('users', "userid='$userid'");
			}
	}