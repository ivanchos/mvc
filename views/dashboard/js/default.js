$(function()
	{
		$.get('dashboard/xhrGetListings',function(o)
			{
				for (var i=0; i<o.length; i++)
					{
						$('#listInsert').append('<div>'+o[i].text+'<a class="del" rel="'+o[i].id+'" href="#">X</a></div>');
					}
					
				// first this function and then data shows on the page
				$('.del').live('click',function()
					{
						var delItem=$(this);
						var id=$(this).attr('rel');
						//alert(id);
						
						$.post('dashboard/xhrDeleteListing',{'id':id},function(o)
							{
								delItem.parent().remove();
							}
						,'json');
						return false; // not to go to the link
					}
				);
			}
		,'json');
		
		$('#randomInsert').submit(function()
			{
				var url=$(this).attr('action'); // form action from views/dashboard/index.php
				var data=$(this).serialize();
				$.post(url, data, function(o)
					{
						$('#listInsert').append('<div>'+o.text+'<a class="del" rel="'+o.id+'" href="#">X</a></div>');
					}
				,'json');
				return false; // handles form through JS and doesn't refresh the page
			}
		);
	}
);