<?php
/*
require "config/paths.php";
require "config/database.php";
require "config/constants.php";

this all goes in config.php and config folder is ready to delete
*/
require "config.php";
require "util/auth.php";

/*
require "libs/bootstrap.php";
require "libs/controller.php";
require "libs/model.php";
require "libs/view.php";

require "libs/database.php";
require "libs/session.php";
require "libs/hash.php";

this all goes in __autoload()
*/
function __autoload($class)
	{
		require LIBS."$class.php";
	}

// loads the Bootstrap
$bootstrap=new bootstrap();
/*
optional paths and files

example:
$bootstrap->setControllerPath('/controllers');
$bootstrap->setModelPath('/models');
// file from folder controllers
$bootstrap->setDefaultFile('index.php');
// file from folder controllers
$bootstrap->setErrorFile('error.php');
*/
$bootstrap->init();


