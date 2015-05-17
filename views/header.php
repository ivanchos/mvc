<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css" />
	<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>
	<?php
	// doesn't have to go $this->view->js because $js is in the view
	if (isset($this->js))
		{
			foreach($this->js as $js)
				{
					echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
				}
		}
	?>
</head>
<body>

<div id="header">
header
<br />
<a href="<?php echo URL; ?>index">Index</a>
<a href="<?php echo URL; ?>help">Help</a>
<?php
if (Session::get('loggedIn')==true):
?>
	<a href="<?php echo URL; ?>dashboard/logout">Logout</a>	
<?php
else:
?>
	<a href="<?php echo URL; ?>login">Login</a>
<?php
endif;
?>
</div>
	
<div id="content">