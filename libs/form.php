<?php
require "form/val.php";
/**
 *  - Fill out a form
 *	- POST to PHP
 *  - Sanitize
 *  - Validate
 *  - Return Data
 *  - Write to Database
 */
class Form
	{
		// @var string $_currentItem - The immediately posted item
		private $_currentItem=null;
		
		// @var associative array $_postData - Stores the posted data
		private $_postData=array();
		
		// @var object $_val - The validator object
		private $_val=array();
		
		//@var array $_error - Holds the current form error
		private $_error = array();
		
		/**
		 * __construct - Instantiates the validator class
		 * 
		 */
		public function __construct()
			{
				$this->_val=new Val();
			}
			
		/**
		 * post - This is to run $_POST
		 * 
		 * @param string $field - The HTML fieldname to post
		 */
		public function post($field)
			{
				//returns value of the array element with the key $field
				$this->_postData[$field]=$_POST[$field];
				//returns string
				$this->_currentItem=$field;
				
				/*
				echo "$this->_currentItem<br />";     returns
				
				name
				age
				gender
				*/
				
				// returns form object needed for chaining the methods in test/form.php
				return $this;
			}
		
		/**
		 * fetch - Return the posted data
		 * 
		 * @param mixed $fieldName
		 * 
		 * @return mixed String or array
		 */
		public function fetch($fieldName=false)
			{
				if ($fieldName)
					{
						if (isset($this->_postData[$fieldName]))
							{
								// returns value of the array element with the key $fieldName
								return $this->_postData[$fieldName];
							}
						else
							{
								return false;
							}
					}
				else
					{
						return $this->_postData;
					}
			}
		
		/**
		 * val - This is to validate
		 * 
		 * @param string $typeOfValidator A method from the Form/Val class
		 * @param string $arg A property to validate against
		 */
		public function val($typeOfValidator, $arg=null)
			{
				/*
				$this->_postData[$fieldName]    $fieldName=$this->_currentItem    makes
				$this->_postData[$this->_currentItem]
				
				$this->_val is Val object $val
				$this->_val->{$typeOfValidator}($postItem)    $postItem=$this->_postData[$this->_currentItem]
				
				example:
				$this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem], $arg) is same as
				$this->_val->minlength('jesse', 2) for $this->_currentItem='name'
				*/
				if ($arg==null)
					{
						$error=$this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem]);
					}
				else
					{
						$error=$this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem], $arg);
					}
					
				if ($error)
					{
						$this->_error[$this->_currentItem]=$error;
					}
				
				//echo "<pre>";
				//print_r($this->_error);
				
				
				// returns form object needed for chaining the methods in test/form.php
				return $this;
			}
		public function submit()
			{
				if (empty($this->_error)) 
					{
						return true;
					} 
				else 
					{
						$str='';
						foreach ($this->_error as $key=>$value)
							{
								$str.=$key.'=>'.$value."\n<br />";
							}
						throw new Exception($str);
					}
			}
	}