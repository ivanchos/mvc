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
				$data=array();
				$data['login']=$_POST['login'];
				$data['password']=$_POST['password'];
				$data['role']=$_POST['role'];
				$this->model->create($data);
				header('location:'.URL.'user');
			}
		public function edit($id)
			{
				$this->view->user = $this->model->userSingleList($id);
				$this->view->render('user/edit');
			}
		public function editSave($id)
			{
				$data=array();
				$data['id']=$id;
				$data['login']=$_POST['login'];
				$data['password']=$_POST['password'];
				$data['role']=$_POST['role'];
				$this->model->editSave($data);
				header('location:'.URL.'user');
			}
		public function delete($id)
			{
				$this->model->delete($id);
				header('location:'.URL.'user');
			}
	}
