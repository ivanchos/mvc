<?php
// tells to show on page
class Note extends Controller
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
				$this->view->noteList=$this->model->noteList();
				$this->view->render('note/index');
			}
		public function create()
			{
				
				$data=array(
					'title'=>$_POST['title'],
					'content'=>$_POST['content'],
					);
				/*
				same as:
				
				$data=array();
				$data['title']=$_POST['title'];
				$data['content']=$_POST['content'];
				*/
				$this->model->create($data);
				header('location:'.URL.'note');
			}
		public function edit($noteid)
			{
				echo $noteid;
				$this->view->note=$this->model->noteSingleList($noteid);
				/*
				if (empty($this->view->note))
					{
						die("This is an invalid note!");
					}
				*/
				$this->view->render('note/edit');
			}
		public function editSave($noteid)
			{
				/*
				$data=array(
					'noteid'=>$noteid,
					'title'=>$_POST['title'],
					'content'=>$_POST['content'],
					);
				same as:
				*/
				$data=array();
				$data['noteid']=$noteid;
				$data['title']=$_POST['title'];
				$data['content']=$_POST['content'];
				$this->model->editSave($data);
				header('location:'.URL.'note');
			}
		public function delete($noteid)
			{
				$this->model->delete($noteid);
				header('location:'.URL.'note');
			}
	}
