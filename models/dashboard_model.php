<?php
class Dashboard_Model extends Model
	{
		function __construct()
			{
				parent::__construct();
			}
		function xhrInsert()
			{
				$text=$_POST['text'];
				$sth=$this->db->prepare("INSERT INTO data (text) VALUES (:text)");
				$sth->execute(array(':text'=>$text));
				
			}
		function xhrGetListings()
			{
				$sth=$this->db->prepare("SELECT * FROM data");
				$sth->setFetchMode(PDO::FETCH_ASSOC);
				$sth->execute();
				$data=$sth->fetchAll();
				echo json_encode($data);
			}
		
	}
	
