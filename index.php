<?php
require "config/paths.php";
require "config/database.php";
require "config/constants.php";
/*
require "libs/bootstrap.php";
require "libs/controller.php";
require "libs/model.php";
require "libs/view.php";

require "libs/database.php";
require "libs/session.php";
require "libs/hash.php";
*/
function __autoload($class)
	{
		require LIBS."$class.php";
	}

$app=new Bootstrap();



