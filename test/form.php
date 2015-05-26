<?php
require '../libs/Form.php';
//$_REQUEST is superglobal that contains $_GET, $_POST, $_COOKIE
if (isset($_REQUEST['run']))
	{
		/*
		returns form object made by array $_postData like:
		Form Object ( [_postData:Form:private] => Array( ) ) 
		it's empty array at the begining and after submit the form:
		Form Object ( [_postData:Form:private] => Array ( [name] => John [age] => 18 [gender] => m ) )   for example
		*/
		$form=new Form();
		$form	->post('name')
				->val('minlength', 2)
				->post('age')
				->post('gender');
		
		$a=$form->fetch();
		$b=$form->fetch('age');
		print_r($a);
		echo $b;
	}
?>
<form method="post" action="?run">
	Name	<input type="text" name="name" />
	Age 	<input type="text" name="age" />
	Gender 	<select name="gender">
				<option value="m">Male</option>
				<option value="f">Female</option>
			</select>
			<input type="submit" value="Submit"/>
</form>