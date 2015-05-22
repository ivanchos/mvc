<?php
// tells to show on page
class User extends Controller
	{
		public function __construct()
			{
				parent::__construct();
				Session::init();
				//returns value of $_SESSION['loggedIn'] defined in libs/session.php and set in models/login_model.php
				$logged=Session::get('loggedIn'); 
				$role=Session::get('role');
				if ($logged==false || $role!='owner')
					{
						Session::destroy();
						header('Location:../login');
						exit;
					}
			}
		public function index()
			{
				$this->view->userList=$this->model->userList();
				$this->view->render('user/index');
			}
		public function create()
			{
				
			}
		public function edit($id)
			{
				
			}
		public function delete($id)
			{
				
			}
	}
