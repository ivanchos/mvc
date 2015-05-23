<?php
class Model
	{
		function __construct()
			{
				// actual values as parameters
				$this->db=new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
			}
	}
	
