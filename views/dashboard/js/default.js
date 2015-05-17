$(function()
	{
		$('#randomInsert').submit(function()
			{
				var url=$(this).attr('action'); // form action from views/dashboard/index.php
				var data=$(this).serialize();
				$.post(url,data,function(o)
					{
						alert(1);
					});
				return false; // form handled through JS and not refresh the page
			});
	}
);