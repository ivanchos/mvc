<?php
//tells to show on page
class Login extends Controller
	{
		function __construct()
			{
				parent::__construct();
				$this->view->render('login/index');
			}
	}
	
?>