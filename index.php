<?php
$url=$_GET['url'];
$url=rtrim($url,'/');
$url=explode('/',$url);
//print_r($url);
require 'controllers/'.$url[0].'.php';
$controller=new $url[0];

if (isset($url[2]))
	{
		$controller->{$url[1]}($url[2]); // $controller->function() asigns method to controller and parameter1
	}
else
	{
		if (isset($url[1]))
			{
				$controller->{$url[1]}(); // $controller->function() asigns method to controller
			}
	}
?>

