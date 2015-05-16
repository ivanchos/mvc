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
				if ($noInclude==true)
					{
						require "views/{$name}.php"; //if it says not to load header and footer, then loads only content
					}
				else
					{
						require "views/header.php";
						require "views/{$name}.php";
						require "views/footer.php";
					}
			}
	}
	
?>