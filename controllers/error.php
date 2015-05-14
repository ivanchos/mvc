<?php
//tells to show on page
class Error extends Controller
	{
		function __construct()
			{
				parent::__construct();
			}
		function index()
			{
				$this->view->msg="This page doesn't exist.";
				$this->view->render('error/index');
			}
	}
	
?>