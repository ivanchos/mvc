<?php
require '../libs/Form.php';
//$_REQUEST is superglobal that contains $_GET, $_POST, $_COOKIE
if (isset($_REQUEST['run']))
	{
		try
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
						->val('minlength', 2)
						->val('digit')
						->post('gender');
				
				
				/*
				returns form object
				
				example:
				Form Object
					(
						[_currentItem:Form:private] => gender
						[_postData:Form:private] => Array
							(
								[name] => John
								[age] => t
								[gender] => m
							)

						[_val:Form:private] => Val Object
							(
							)

						[_error:Form:private] => Array
							(
								[age] => Your string must be a digit
							)

					) 
				*/
				$form	->submit();
				//if form throws an exception than nothing else will happen
				echo 'The form passed!';
				$data = $form->fetch();
				echo '<pre>';
				print_r($data);
				echo '</pre>';
			}
		catch (Exception $e)
			{
				//this function has no parameters and returns the Exception message as a string
				echo $e->getMessage();
			}
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