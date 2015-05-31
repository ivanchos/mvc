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
				$this->view->title="404 error";
				$this->view->msg="This page doesn't exist.";
				$this->view->render('header');
				$this->view->render('error/index');
				$this->view->render('footer');
			}
	}
	
