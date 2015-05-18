$(function()
	{
		$.get('dashboard/xhrGetListings',function(o)
			{
				for (var i=0; i<o.length; i++)
					{
						$('#listInsert').html(o[i].text);
					}
			}
		,'json');
		
		$('#randomInsert').submit(function()
			{
				var url=$(this).attr('action'); // form action from views/dashboard/index.php
				var data=$(this).serialize();
				$.post(url, data, function(o)
					{
						alert(1);
						
					}
				);
				return false; // form handled through JS and not refresh the page
			}
		);
		
	}
);