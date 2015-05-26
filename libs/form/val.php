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
	}