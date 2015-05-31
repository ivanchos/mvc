<?php
class Controller
	{
		function __construct()
			{
				//echo "Main controller.<br />";
				$this->view=new View();
			}
			
		/**
		 * 
		 * @param string $name - name of the model
		 * @param string $path - location of the models
		 */
		//public function loadModel($name)
		public function loadModel($name,$modelPath="models/")
			{
				//$path="models/{$name}_model.php";
				$path="{$modelPath}{$name}_model.php";
				if (file_exists($path))
					{
						require $path;
						$modelName="{$name}_model";
						$this->model=new $modelName();
					}
			}
	}
	
