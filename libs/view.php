<?php
class View
	{
		function __construct()
			{
				//echo "This is a view.<br />";
			}
		public function render($name)
			{
				require "views/{$name}.php";
			}
	}
	
?>