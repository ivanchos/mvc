<?php
class Dashboard_Model extends Model
	{
		function __construct()
			{
				parent::__construct();
			}
		function xhrInsert()
			{
				echo $_POST['text'];
				
			}
		
	}
	
