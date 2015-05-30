<?php
class Bootstrap
	{
		private $_url=null;
		
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
				$controller=new Index();
				$controller->index();// if there is no controller render('index/index')
			}
			
		/**
		 * Loads existing controller if there is a GET parameter passed
		 * 
		 * @return boolean|string
		 */
		private function _loadExistingController()
			{
				$file="controllers/{$url[0]}.php";
				if (file_exists($file))
					{
						require $file;
						$controller=new $url[0];
						$controller->loadModel($url[0]);
					}
				else
					{
						$this->_error();
						return false;
					}
			}
		
		/**
		 * If a method is passed in the GET url paremter
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
				if (isset($url[2]))
					{
						// if method $url[1] exists inside controller
						if (method_exists($controller,$url[1]))
							{
								$controller->{$url[1]}($url[2]); // $controller->function() asigns method to controller and parameter1
							}
						else
							{
								$this->_error();
							}
					}
				else
					{
						if (isset($url[1]))
							{
								if (method_exists($controller,$url[1]))
									{
										$controller->{$url[1]}(); // $controller->function() asigns method to controller
									}
								else
									{
										$this->_error();
									}
							}
						else
							{
								$controller->index();
							}
					}
			}
			
		private function _error()
			{
				require "controllers/error.php";
				$controller=new Error();
				$controller->index();
				return false;
			}
	}
