<?php
class Bootstrap
	{
		function __construct()
			{
				$url=isset($_GET['url'])?$_GET['url']:null;
				$url=rtrim($url,'/');
				$url=explode('/',$url);
				// print_r($url);
				if (empty($url[0]))
					{
						require "controllers/index.php";
						$controller=new Index();
						$controller->index();// if there is no controller render('index/index')
						return false;
					}
				$file="controllers/{$url[0]}.php";
				if (file_exists($file))
					{
						require $file;
					}
				else
					{
						$this->error();
					}
				$controller=new $url[0];
				$controller->loadModel($url[0]);
				if (isset($url[2]))
					{
						// if method $url['1'] exists inside controller
						if (method_exists($controller,$url['1']))
							{
								$controller->{$url[1]}($url[2]); // $controller->function() asigns method to controller and parameter1
							}
						else
							{
								$this->error();
							}
					}
				else
					{
						if (isset($url[1]))
							{
								if (method_exists($controller,$url['1']))
									{
										$controller->{$url[1]}(); // $controller->function() asigns method to controller
									}
								else
									{
										$this->error();
									}
							}
						else
							{
								$controller->index();
							}
					}
			}
		function error()
			{
				require "controllers/error.php";
				$controller=new Error();
				$controller->index();
				return false;
			}
	}
?>