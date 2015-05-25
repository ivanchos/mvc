<?php
class User_Model extends Model
	{
		public function __construct()
			{
				parent::__construct();
			}
		public function userList()
			{
				return $this->db->select('SELECT id, login, role FROM users');
			}
		public function userSingleList($id)
			{
				return $this->db->select('SELECT id, login, role FROM users WHERE id=:id', array(':id'=>$id));
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
				$this->db->update('users', $postData, "id={$data['id']}");
			}
		public function delete($id)
			{
				$result=$this->db->select('SELECT role FROM users WHERE id=:id', array(':id'=>$id));
				
				/*
				returns multidimensional array because role is array with values (default, admin, owner)
				Array ( [0] => Array ( [role] => default ) )
				Array ( [1] => Array ( [role] => default ) )
				Array ( [2] => Array ( [role] => default ) )
				...
				
				it's only one element for chosen $id, so that's why its index is [0] and $result[0]
				Array ( [0] => Array ( [role] => default ) )
				
				also:
				change $this->user['id'] into $this->user[0]['id']
				change $this->user['login'] into $this->user[0]['login']
				change $this->user['role'] into $this->user[0]['role']
				in views/user/edit.php
				*/
				if ($result[0]['role']=='owner')
					{
						return false;
					}
				$this->db->delete('users', "id='$id'");
			}
	}