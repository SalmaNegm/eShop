$(function()
{
	$('#nameError').hide();
	$('#viewer').hide();
	function searchProducts()
	{
		searchQuery=$('#edit_SearchProductName :selected').text();
		console.log(searchQuery);
	}
	
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
				success: function (responce)
				 {
					arr=$.parseJSON(responce);
					$('#scNames_menu_edit').empty();
					for (var i = 0; i < arr.length; i++) 
					{
						$('#scNames_menu_edit').append('<option value="'+arr[i]["scID"]+'">'+arr[i]["scName"]+'</option>');
					}		
				},
				error: function (error) {
					console.log(error);
				}
			});
	}

	draw_scMenu();

	// ------------------------------------------------------ update ----------------------------------------------------
	$("#scNames_menu_editProduct").on("change",function(event){
		
		d={};
		d.selected_scID=$('#scNames_menu_editProduct :selected').attr('value');
		$.ajax
			({
				url: "adminCategory_server.php",
				type: 'GET',
				dataType: 'html',
				data: d,
				success: function (responce) {
					arr=$.parseJSON(responce);
					$('#scNames_menu_editProduct').empty();
					for (var i = 0; i < arr.length; i++) {
						$('#scNames_menu_editProduct').append('<option value="'+arr[i]["scID"]+'">'+arr[i]["scName"]+'</option>');
					};			
				},
				error: function (error) {
					console.log(error);
				}
			});
		
	});
	$('#edit_SearchProductName').on('change',function(){
		searchProducts();
	});

	$('body').delegate('#browsers','change',function(){
		alert('dsf');
	});
	$('#search_btn').on('click',function(){
		isValid=false;
		$('#browsers').children().each(function(idx,opn){
			$('#searchError').text('Please choose a valid product name from the list');
			if($(opn).attr('value')==$('#tt').val())
			{
				$('#searchError').text('');
				$('#tt').attr('value',"");
				isValid=true;
				return 0;
			}
		});
		if(isValid)
		{
			$('#viewer').show();
			d={};
			d.selected_pID=$('#browsers option[value='+$('#tt').val()+']').attr('data-pid');
			// alert(d.selected_pID);
			$.ajax
			({
				url: "../admin/adminEditProduct_server.php",
				type: 'GET',
				dataType: 'html',
				data: d,
				success: function (responce) {
					arr=$.parseJSON(responce);
					$('#searchError').text('');
					$('#hidden_pID').attr('value',arr['pro']['pID']);
					$('input[name=insert_pName]').val(arr['pro']['pName']);
					$('#cNames_menu_edit option[value='+arr['cID']+']').attr('selected','selected');
					draw_scMenu();
					$('#scNames_menu_edit option[value='+arr['pro']['scID']+']').attr('selected','selected');
					$('input[name=insert_pPrice]').val(arr['pro']['pPrice']);
					$('input[name=insert_pQuantity]').val(arr['pro']['pQuantity']);
					$('#dispImg').attr('src',arr['pro']['pImg']);
					$('textarea[name=insert_pDesc]').val(arr['pro']['pDesc']);		
				},
				error: function (error) {
					console.log(error);
				}
			});	
		}
	});

	$('input[name=edit_ok]').on('click',function(){
		$('#viewer').hide();
	});
	$('#cNames_menu_edit').on("change",function(){
		
		draw_scMenu()
	});


	
});