<?php
class Error extends Controller
	{
		function __construct()
			{
				parent::__construct();
				echo "We are in error.<br />";
				$this->view->msg="This page doesn't exist.";
				$this->view->render('error/index');
			}
	}
	
?>