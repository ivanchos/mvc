<?php
class Val
	{
		public function __construct()
			{
				
			}
		public function minlength($data, $arg)
			{
				if (strlen($data)<$arg)
					{
						return "Your string must be minimum $arg character(s) long";
					}
			}
		public function maxlength($data, $arg)
			{
				if (strlen($data)>$arg)
					{
						return "Your string must be maximum $arg character(s) long";
					}
			}
		public function digit($data)
			{
				// ctype_digit($data) checks if all characters in string $data are digits
				if (ctype_digit($data)==false)
					{
						return "Your string must be a digit";
					}
			}
		/*
		__call() magic method is triggered when calling inaccessible methods $name with arguments $arguments in an object 
		__CLASS__ is magic constant for class name and includes the namespace where it was declared 
		*/
		public function __call($name, $arguments) 
			{
				throw new Exception("$name does not exist inside of: " . __CLASS__);
			}
	}