<?php

class Form
	{
		//associative array
		private $_postData=array();
		public function __construct()
			{
				
			}
		public function post($field)
			{
				$this->_postData[$field]=$_POST[$field];
			}
		public function val()
			{
				
			}
	}