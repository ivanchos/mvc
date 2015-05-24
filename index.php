<?php
/*
require "config/paths.php";
require "config/database.php";
require "config/constants.php";

this all goes in config.php and config folder is ready to delete
*/
require "config.php";

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

$app=new Bootstrap();



