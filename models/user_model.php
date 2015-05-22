<?php
class User_Model extends Model
	{
		public function __construct()
			{
				parent::__construct();
			}
		public function userList()
			{
				$sth = $this->db->prepare('SELECT id, login, role FROM users');
				$sth->execute();
				return $sth->fetchAll();
				
			}
	}
