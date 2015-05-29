<?php
// tells to show on page
class Dashboard extends Controller
	{
		function __construct()
			{
				parent::__construct();
				/*
				Session::init();
				//returns value of $_SESSION['loggedIn'] defined in libs/session.php and set in models/login_model.php
				$logged=Session::get('loggedIn'); 
				if ($logged==false)
					{
						Session::destroy();
						header('Location:../login');
						exit;
					}
		        */
				Auth::handleLogin();
				$this->view->js=array('dashboard/js/default.js'); // this path because $js variable is in the view
			}
		function index()
			{
				$this->view->render('dashboard/index');
			}
		function logout()
			{
				Session::destroy();
				header('location:'.URL.'login');
				exit;
			}
		// AJAX function xhr (XMLHttpRequest)
		function xhrInsert()
			{
				$this->model->xhrInsert();
			}
		function xhrGetListings()
			{
				$this->model->xhrGetListings();
			}
		function xhrDeleteListing()
			{
				$this->model->xhrDeleteListing();
			}
	}
