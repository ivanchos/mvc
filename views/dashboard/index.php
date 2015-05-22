<?php
echo "Dashboard... Logged in only...";
?>
<br />
<form id="randomInsert" action="<?php echo URL; ?>dashboard/xhrInsert/" method="post">
<input type="text" name="text" />
<input type="submit" value="Submit" />
</form>
<br />
<div id="listInsert">
</div>