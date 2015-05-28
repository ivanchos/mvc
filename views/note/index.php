<h1>Note</h1>
<form method="post" action="<?php echo URL; ?>note/create">
	<label>Login</label>
		<input type="text" name="login" /><br />
	
	<label>&nbsp;</label>
		<input type="submit"  value="Submit" />
</form>
<hr />
<table>
<?php
// variable from controllers/note.php, returns array as a result of a function $this->model->noterList()
foreach($this->noteList as $key=>$value)
	{
		/*
		echo "<tr>";
		echo "<td>{$value['userid']}</td>";
		echo "<td>{$value['login']}</td>";
		echo "<td>{$value['role']}</td>";
		echo '<td>
				<a href="'.URL.'user/edit/'.$value['userid'].'">Edit</a>
				<a href="'.URL.'user/delete/'.$value['userid'].'">Delete</a></td>';
		echo "</tr>";
		*/
	}
?>
</table>