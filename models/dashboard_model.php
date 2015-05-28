<?php
class Dashboard_Model extends Model
	{
		public function __construct()
			{
				parent::__construct();
			}
		function xhrInsert()
			{
				$text=$_POST['text'];
				$this->db->insert('data',array('text'=>$text));
				$data=array('text'=>$text,'id'=>$this->db->lastInsertId());
				echo json_encode($data);
			}
		function xhrGetListings()
			{
				$result=$this->db->select("SELECT * FROM data");
				echo json_encode($result);
			}
		function xhrDeleteListing()
			{
				/*
				Type casting in PHP:
				the name of the desired type is written in parentheses before the variable which is to be cast. 
				http://php.net/manual/en/language.types.type-juggling.php#language.types.typecasting
				*/
				$id=(int)$_POST['id'];
				$this->db->delete('data', "id='$id'");
			}
	}

	
