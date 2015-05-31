<?php
//defines what to view (show) on required page
class View
	{
		function __construct()
			{
				//echo "This is a view.<br />";
			}
		public function render($name,$noInclude=false)
			{
				/*
				if ($noInclude==true)
					{
						//if it says not to load header and footer, then loads only content
						require "views/{$name}.php"; 
					}
				else
					{
						require "views/header.php";
						require "views/{$name}.php";
						require "views/footer.php";
					}
				*/
				require "views/{$name}.php";
			}
	}
	
