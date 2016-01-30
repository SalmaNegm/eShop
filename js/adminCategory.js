$(function()
{
	
	// ------------------------------------------------------ insert ----------------------------------------------------
	$('input[name=okAdd]').on("click",function(event){
		event.preventDefault();
		var d={};
		d.categoryName=$.trim($('input[name=categoryName]').val());

		$.ajax({
			url: "adminCategory_server.php",
			type: 'GET',
			dataType: 'html',
			data: d,
			success: function (response) {
				exp=new RegExp('^[0-9]+$');
				if(exp.test(response))
				{
					$(this).addClass("success");//not executing !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
					$('#error:first').text('');
					$('input[name=categoryName]').val('');
					$('.adminTable').append("<tr><td class='cName_col'>"+d.categoryName+"</td><td><a class='delete' href='' value="+response+">delete</a></td></tr>");
					$('select[name=cNames_menu]').append("<option value='"+response+"'>"+d.categoryName+"</option>");
				}
				else
				{
					$('#error:first').text(response);
				}
				
			},
			error: function (error) {
				console.log(error);
			}
		});
	
	});
	
	// ------------------------------------------------------ delete ----------------------------------------------------
	$('body').delegate('.delete',"click",function(event){
		event.preventDefault();
		// alert($(this).attr('value'));
		var d={};
		d.cID=$(this).attr('value');
		el=$(this);
		$.ajax({
			url: "adminCategory_server.php",
			type: 'GET',
			dataType: 'html',
			data: d,
			success: function (response) {
				if(response=='done')
				{
					el.parent().parent().remove();
					console.log(response);
					$('select[name=cNames_menu] option[value='+d.cID+']').remove();
				}
				
			},
			error: function (error) {
				console.log(error);
			}
		});	
	});
	// ------------------------------------------------------ update ----------------------------------------------------
	$('body').delegate('input[name=okEdit]',"click",function(event){
		if($.trim($('select[name=cNames_menu] option:selected').text())=='')
		{
			$('#categoryNewName').val('');
			$('table ~ #error').text('no categories to update');
			return 0;
		}
		event.preventDefault();
		d={};
		d.newCName=$.trim($('#categoryNewName').val());
		var catId=$('select[name=cNames_menu] option:selected').attr('value');
		$.ajax
		({
			url: "adminCategory_server.php?ID='"+catId+"'",
			type: 'POST',
			dataType: 'html',
			data: d,
			success: function (response) 
			{
				if(response=='done')
				{
					$('table ~ #error').text('');
					$('#categoryNewName').val('');
					$('select[name=cNames_menu] option:selected').text(d.newCName);
					$('a[value='+catId+']').parent().siblings('.cName_col').text(d.newCName);
				}
				else
				{
					$('table ~ #error').text(response);
				}
				
			},
			error: function (error) 
			{
				console.log(error);
			}
		});
		
	});


	
});