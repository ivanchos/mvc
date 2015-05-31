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
				//echo Hash::create('sha256','jesse',HASH_PASSWORD_KEY);
				//echo Hash::create('sha256','test2',HASH_PASSWORD_KEY);
				//echo "inside index index";
				$this->view->title="Home";
				$this->view->render('header');
				$this->view->render('index/index');
				$this->view->render('footer');
			}
	}
	
