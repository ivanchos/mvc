<?php
class Help extends Controller
	{
		function __construct()
			{
				parent::__construct();
				echo "We are in help.<br />";
			}
		public function other($arg=false)
			{
				echo "We are in other.<br />";
				echo "Optional: {$arg}.<br />";
			}
	}
?>