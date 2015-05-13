<?php
class Help
	{
		function __construct()
			{
				echo "We are in help.<br />";
			}
		public function other($arg=false)
			{
				echo "We are in other.<br />";
				echo "Optional: {$arg}.<br />";
			}
	}
?>