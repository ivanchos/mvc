<?php
class User_Model extends Model
	{
		public function __construct()
			{
				parent::__construct();
			}
		public function userList()
			{
				$sth=$this->db->prepare('SELECT id, login, role FROM users');
				$sth->execute();
				return $sth->fetchAll();
				
			}
		public function userSingleList($id)
			{
				$sth=$this->db->prepare('SELECT id, login, role FROM users WHERE id=:id');
				$sth->execute(array(
					':id'=>$id
					));
				return $sth->fetch();
			}
		public function create($data)
			{
				$this->db->insert('users', array(
					'login'=>$data['login'],
					'password'=>Hash::create('md5', $data['password'], HASH_PASSWORD_KEY),
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
					'password'=>Hash::create('md5', $data['password'], HASH_PASSWORD_KEY),
					'role'=>$data['role']
					);
				$this->db->update('users', $postData, "id={$data['id']}");
			}
		public function delete($id)
			{
				$sth=$this->db->prepare('DELETE FROM users WHERE id = :id');
				$sth->execute(array(
					':id'=>$id
					));
			}
	}
