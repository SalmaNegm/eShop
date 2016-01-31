$(function()
{
	function draw_scMenu()
	{
		d={};
		d.selected_cID=$('#cNames_menu_edit :selected').attr('value');
		$.ajax
			({
				url: "adminCategory_server.php",
				type: 'GET',
				dataType: 'html',
				data: d,
				success: function (responce) {
					arr=$.parseJSON(responce);
					$('#scNames_menu_edit').empty();
					for (var i = 0; i < arr.length; i++) {
						$('#scNames_menu_edit').append('<option value="'+arr[i]["scID"]+'">'+arr[i]["scName"]+'</option>');
					}			
				},
				error: function (error) {
					console.log(error);
				}
			});
	}

	draw_scMenu();

	// ------------------------------------------------------ insert ----------------------------------------------------
	$('#okAddSC').on("click",function(event){
		event.preventDefault();

		var d={};
		d.subcategoryName=$.trim($('#subcategoryName').val());
		d.catId=$('#cNames_menu option:selected').attr('value');

		if($('#cNames_menu option:selected').text()=='')
		{
			$('#insert_error').text("no categories   ");
			$('#insert_error').append("<a href='adminCategories.php'>add category</a>");
			return 0;
		}
		if(d.subcategoryName=='')
		{
			$('#insert_error').text('please choose a name for your new subcategory');
			return 0;
		}
		$.ajax
		({
			url: "adminCategory_server.php",
			type: 'GET',
			dataType: 'html',
			data: d,
			success: function (responce) {
				// console.log(responce);
				exp=new RegExp('^[0-9]+$');
				if(exp.test(responce))
				{
					//$(this).addClass("success");//not executing !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
					$('#error:first').text('');
					
					draw_scMenu();
					// if($('.cNameCol[value='+responce+']').parent().children().length == 0)
					// {
					// 	$('.cNameCol[value='+responce+']').next().remove;
					// 	$('.cNameCol[value='+responce+']').parent().append("<td class='scNameCol'>"+$('#subcategoryName').val()+"</td>");
					// 	$('.cNameCol[value='+responce+']').parent().append("<td class='actCol'><a href='' class='deleteSC' value='"+responce+"'>delete</a></td>");
					// }
					// else
					// {
					// 	$('.cNameCol[value='+responce+']').parent().after("<tr><td class='scNameCol'>"+$('#subcategoryName').val()+"</td><td class='actCol'><a href='' class='deleteSC' value='"+responce+"'>delete</a></td></tr>");
					// 	n=$('td[value='+responce+']').attr('rowspan');
					// 	$('td[value='+responce+']').attr('rowspan',n+1);
					// }
					$('#subcategoryName').val('');

					// $('.adminTable').append("<tr><td class='cName_col'>"+d.categoryName+"</td><td><a class='delete' href='' value="+response+">delete</a></td></tr>");
					// $('select[name=cNames_menu]').append("<option value='"+response+"'>"+d.categoryName+"</option>");
				

				}
				else
					$('#insert_error').text(responce);				
			},
			error: function (error) {
				console.log(error);
			}
		});
	
	});
	// ------------------------------------------------------ delete ----------------------------------------------------
	$('body').delegate('.deleteSC',"click",function(event){
		event.preventDefault();
		var d={};
		d.scID=$(this).attr('value');
		el=$(this);
		$.ajax({
			url: "adminCategory_server.php",
			type: 'GET',
			dataType: 'html',
			data: d,
			success: function (responce) 
			{
				//arr[0]->count ... arr[1]->cID
				$('#scNames_menu_edit option').remove('[value='+d.scID+']');
				arr=$.parseJSON(responce);
				exp=new RegExp('^[0-9]+$');
				if(exp.test(arr[0]))
				{
					act_td=$(this).parent();
					scName_td=act_td.siblings('.scNameCol');
					if(arr[0]==0) // no subcategories
					{
						$('a[value='+d.scID+']').parent().siblings('.scNameCol').replaceWith("<td colspan='2'> --------- This Category is EMPTY --------- </td>");
						$('a[value='+d.scID+']').parent().remove();
						$('td[value='+arr[1]+']').attr('rowspan',1);
					}
					else
					{
						v=$('.cNameCol[value='+arr[1]+']').siblings('.actCol').children().first().attr('value');
						if(v==d.scID) //first row
						{
							$('td[value='+arr[1]+']').attr('rowspan',arr[0]);
							$('a.deleteSC[value='+v+']').parent().siblings('.scNameCol').remove();
							$('a.deleteSC[value='+v+']').parent().parent().append($('a.deleteSC[value='+v+']').parent().parent().next().children())
							$('a.deleteSC[value='+v+']').parent().remove();
							$('.cNameCol[value='+arr[1]+']').parent().next().remove();	
						}
						else
						{
							$('a[value='+d.scID+']').parent().parent().remove();
							$('td[value='+arr[1]+']').attr('rowspan',arr[0]);
						}
					}
				}
				
			},
			error: function (error) {
				console.log(error);
			}
		});	
	});
	// // ------------------------------------------------------ update ----------------------------------------------------
	$("#okEditSC").on("click",function(event){
		event.preventDefault();
		// console.log($("#newSubcategory").val());
		d={};
		d.catID=$('#cNames_menu_edit :selected').attr("value");
		if(d.catID == undefined)
			d.catID='';
		d.scatID=$('#scNames_menu_edit :selected').attr("value");
		if(d.scatID == undefined)
			d.scatID='';
		d.newName=$.trim($("#newSubcategory").val());
		$.ajax
		({
			url: "adminCategory_server.php",
			type: 'GET',
			dataType: 'html',
			data: d,
			success: function (responce) 
			{
				 if(responce=='done')
				{
					$('#newSubcategory').val('');
					draw_scMenu();
				}
				else
				{
					$('#edit_error').text(responce);
				}
				
			},
			error: function (error) 
			{
				console.log(error);
			}
		});
		
	});

	$('#cNames_menu_edit').on("change",function(){
		
		draw_scMenu()
	});


	
});