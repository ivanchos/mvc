<?php
//tells to show on page
class Index extends Controller
	{
		function __construct()
			{
				parent::__construct();
				$this->view->render('index/index');
			}
	}
	
?>