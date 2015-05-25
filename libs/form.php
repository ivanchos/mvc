<?php
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
		//associative array
		private $_postData=array();
		public function __construct()
			{
				
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
						// returns array, it's not a function
						return $this->_postData;
					}
			}
		
		/**
		 * val - This is to validate
		 * 
		 * @param string $typeOfValidator A method from the Form/Val class
		 * @param string $arg A property to validate against
		 */
		public function val()
			{
				// returns form object needed for chaining the methods in test/form.php
				return $this;
			}
	}