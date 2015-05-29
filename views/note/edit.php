<h1>Note: Edit</h1>

<?php
/*
can go $this->note[0] because it's multidimensional array with one element [0] and that's array with values (noteid, title, content)
function noteSingleList($noteid) from models/note_model.php
*/
print_r($this->note);
?>
<form method="post" action="<?php echo URL;?>note/editSave/<?php echo $this->note[0]['noteid']; ?>">
	<label>Title</label><input type="text" name="title" value="<?php echo $this->note[0]['title']; ?>" /><br />
	<label>Content</label><textarea name="content"><?php echo $this->note[0]['content']; ?></textarea><br />
	<label>&nbsp;</label><input type="submit" value="Submit"/>
</form>