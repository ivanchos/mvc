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
						return "Your string can only be $arg long";
					}
			}
		public function maxlength($data, $arg)
			{
				if (strlen($data)>$arg)
					{
						return "Your string can only be $arg long";
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
	}