<?php
//tells to show on page
class Index extends Controller
	{
		function __construct()
			{
				parent::__construct();
			}
		function index()
			{
				echo "inside index index";
				$this->view->render('index/index');
			}
		function details()
			{
				$this->view->render('index/index');
			}
	}
	
?>