<?php
class Bootstrap
	{
		private $_url=null;
		private $_controller=null;
		//always includes trailing slash
		private $_controllerPath="controllers/";
		//always includes trailing slash
		private $_modelPath="models/";
		private $_errorFile="error.php";
		private $_defaultFile="index.php";
		
		/**
		 * starts the Bootstrap
		 * 
		 * @return boolean
		 */
		public function init()
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
		 * (optional) sets a custom path to controllers
		 * @param string $path
		 */
		public function setControllerPath($path)
			{
				$this->_controllerPath=trim($path,'/').'/';
			}
			
		 /**
		 * (optional) sets a custom path to models
		 * @param string $path
		 */
		public function setModelPath($path)
			{
				$this->_modelPath=trim($path,'/').'/';
			}
			
		/**
		 * (optional) sets a custom path to the error file
		 * @param string $path - uses the file name of controller, eg: error.php
		 */
		public function setErrorFile($path)
			{
				$this->_errorFile=trim($path,'/');
			}
			
		/**
		 * (optional) sets a custom path to the default file
		 * @param string $path - uses the file name of controller, eg: index.php
		 */
		public function setDefaultFile($path)
			{
				$this->_defaultFile=trim($path,'/');
			}
		
		/**
		 * fetches the $_GET from 'url'
		 */	
		private function _getUrl()
			{
				$url=isset($_GET['url'])?$_GET['url']:null;
				$url=rtrim($url,'/');
				$url = filter_var($url,FILTER_SANITIZE_URL);
				// returns an array
				$this->_url=explode('/',$url);
			}
			
		/**
		 * loads if there is no GET parameter passed
		 */	
		private function _loadDefaultController()
			{
				//require "controllers/index.php";
				require $this->_controllerPath.$this->_defaultFile;
				$this->_controller=new Index();
				// if there is no controller render('index/index')
				$this->_controller->index();
			}
			
		/**
		 * loads existing controller if there is a GET parameter passed
		 * 
		 * @return boolean|string
		 */
		private function _loadExistingController()
			{
				/*some file from controllers folder
				
				example:
				(user, note, login...)
				//$file="controllers/{$this->_url[0]}.php";
				*/
				$file=$this->_controllerPath.$this->_url[0].'.php'; 
				if (file_exists($file))
					{
						require $file;
						//$file (class) from above extends class controller with method loadModel()
						$this->_controller=new $this->_url[0];
						//file from models folder
						$this->_controller->loadModel($this->_url[0],$this->_modelPath);
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
				$length=count($this->_url);
				if ($length>1)
					{
						if (!method_exists($this->_controller,$this->_url[1]))
							{
								$this->_error();
							}
					}
				// determines what to load
				switch ($length)
					{
						case 5:
							//controller->method(param1,param2,param3)
							$this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3],$this->_url[4]);
							break;
						case 4:
							//controller->method(param1,param2)
							$this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3]);
							break;
						case 3:
							//controller->method(param1)
							$this->_controller->{$this->_url[1]}($this->_url[2]);
							break;
						case 2:
							//controller->method()
							$this->_controller->{$this->_url[1]}();
							break;
						default:
							$this->_controller->index();
							break;
					}
			}
		
		/**
		 * displays an error page if nothing exists
		 * 
		 * @return boolean
		 */
		private function _error()
			{
				//require "controllers/error.php";
				require $this->_controllerPath.$this->_errorFile; 
				$this->_controller=new Error();
				$this->_controller->index();
				return false;
			}
	}
