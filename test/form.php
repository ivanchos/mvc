<?php
require "../config.php";
require "../libs/form.php";
require "../libs/database.php";

//$_REQUEST is superglobal that contains $_GET, $_POST, $_COOKIE
if (isset($_REQUEST['run']))
	{
		try
			{
				/*
				returns form object made by array $_postData like:
				Form Object 
					( 
						[_postData:Form:private] => Array( ) 
					) 
				it's empty array at the begining
				
				Makes form object vith variables $_currentItem, $_postData, $_val, $_error and makes val object inside $this->_val
				as __construct(). Runs post function and returns form object $this which runs val function. Val function takes 
				variable $this->_val of form object and that's val object and runs function $typeOfValidator which is defined in Val class
				as functions minlength, maxlength, digit. Parameters of function $typeOfValidator are $this->_postData[$this->_currentItem],
				$arg and those are the parameters of functions minlength, maxlength, digit named as $data which stands for
				$this->_postData[$this->_currentItem], $arg which stands for $arg. Result is a string from functions minlength, maxlength,
				digit and goes in $error variable. $errror varable goes to $this->_error array. Finaly val function returns form object
				$this and these steps repeates
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
				$db=new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
				$db->insert('person', $data);
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