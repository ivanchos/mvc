<?php
// tells to show on page
class Login extends Controller
	{
		function __construct()
			{
				parent::__construct();
			}
		function index()
			{
				$this->view->render('login/index');
			}
		// function called from login form in views/login/index.php
		function run()
			{
				$this->model->run(); // method calls function 'run' from models/login_model.php
			}
	}
	
