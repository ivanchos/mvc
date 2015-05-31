<?php
// tells to show on page
class User extends Controller
	{
		public function __construct()
			{
				parent::__construct();
				/*
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
				*/
				Auth::handleLogin();
			}
		public function index()
			{
				$this->view->title="Users";
				$this->view->userList=$this->model->userList();
				$this->view->render('header');
				$this->view->render('user/index');
				$this->view->render('footer');
			}
		public function create()
			{
				$data=array();
				$data['login']=$_POST['login'];
				$data['password']=$_POST['password'];
				$data['role']=$_POST['role'];
				$this->model->create($data);
				header('location:'.URL.'user');
			}
		public function edit($userid)
			{
				$this->view->title="Edit user";
				$this->view->user = $this->model->userSingleList($userid);
				$this->view->render('header');
				$this->view->render('user/edit');
				$this->view->render('footer');
			}
		public function editSave($userid)
			{
				$data=array();
				$data['userid']=$userid;
				$data['login']=$_POST['login'];
				$data['password']=$_POST['password'];
				$data['role']=$_POST['role'];
				$this->model->editSave($data);
				header('location:'.URL.'user');
			}
		public function delete($userid)
			{
				$this->model->delete($userid);
				header('location:'.URL.'user');
			}
	}
