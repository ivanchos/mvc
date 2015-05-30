<?php
class Bootstrap
	{
		private $_url=null;
		private $_controller=null;
		
		function __construct()
			{
				// Sets the protected $_url
				$this->_getUrl();
				
				// Loads the default controller if no URL is set
				if (empty($this->_url[0]))
					{
						$this->_loadDefaultController();
						return false;
					}
				$this->_loadExistingController();
				$this->_callControllerMethod();
			}
			
		/**
		 * fetches the $_GET from 'url'
		 */	
		private function _getUrl()
			{
				$url=isset($_GET['url'])?$_GET['url']:null;
				$url=rtrim($url,'/');
				$url = filter_var($url,FILTER_SANITIZE_URL);
				$this->_url=explode('/',$url);
			}
			
		/**
		 * loads if there is no GET parameter passed
		 */	
		private function _loadDefaultController()
			{
				require "controllers/index.php";
				$this->_controller=new Index();
				$this->_controller->index();// if there is no controller render('index/index')
			}
			
		/**
		 * loads existing controller if there is a GET parameter passed
		 * 
		 * @return boolean|string
		 */
		private function _loadExistingController()
			{
				$file="controllers/{$this->_url[0]}.php";
				if (file_exists($file))
					{
						require $file;
						$this->_controller=new $this->_url[0];
						$this->_controller->loadModel($this->_url[0]);
					}
				else
					{
						$this->_error();
						return false;
					}
			}
		
		/**
		 * if a method is passed in the GET url paremter
		 * 
		 *  http://localhost/controller/method/(param)/(param)/(param)
		 *  url[0] = controller
		 *  url[1] = method
		 *  url[2] = param (optional)
		 *  url[3] = param (optional)
		 *  url[4] = param (optional)
		 */
		private function _callControllerMethod()
			{
				if (isset($this->_url[2]))
					{
						// if method $this->_url[1] exists inside controller
						if (method_exists($this->_controller,$this->_url[1]))
							{
								// $controller->function() asigns method to controller and parameter1
								$this->_controller->{$this->_url[1]}($this->_url[2]); 
							}
						else
							{
								$this->_error();
							}
					}
				else
					{
						if (isset($this->_url[1]))
							{
								if (method_exists($this->_controller,$this->_url[1]))
									{
										$this->_controller->{$this->_url[1]}(); // $this->_controller->function() asigns method to controller
									}
								else
									{
										$this->_error();
									}
							}
						else
							{
								$this->_controller->index();
							}
					}
			}
		
		/**
		 * displays an error page if nothing exists
		 * 
		 * @return boolean
		 */
		private function _error()
			{
				require "controllers/error.php";
				$this->_controller=new Error();
				$this->_controller->index();
				return false;
			}
	}
