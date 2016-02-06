$(function(){
	$('#viewer').hide();
	$('#search_btn').on('click',function(event){
		event.preventDefault();
		isValid=false;
		$('#browsers').children().each(function(idx,opn){
			$('#searchError').text('Please choose a valid product name from the list');
			if($(opn).attr('value')==$('#tt').val())
			{
				$('#searchError').text('');
				$('#tt').attr('value',"");
				isValid=true;
				return 0; //to break the loop
			}
		});
		if(isValid)
		{
			d={};
			d.selected_emial=$('#browsers option[value='+$('#tt').val()+']').text();

			$.ajax
			({
				url: '../admin/reviewCustomer_server.php',
				type: 'GET',
				dataType: 'html',
				data: d,
				success: function (responce) {
					arr=$.parseJSON(responce);
					alert(arr);
				// 	$('#searchError').text('');
				// 	$('#viewer').show();
				// 	$('#hidden_pID').attr('value',arr['pro']['pID']);
				// 	$('#name').text(arr['pro']['pName']);
				// 	$('#cNames_menu_edit').text(arr['cName']);
				// 	$('#scNames_menu_edit').text(arr['scName']);
				// 	$('#insert_pPrice').text(arr['pro']['pPrice']);
				// 	$('#insert_pQuantity').text(arr['pro']['pQuantity']);
				// 	$('#dispImg').attr('src',arr['pro']['pImg']);
				// 	$('#insert_pDesc').text(arr['pro']['pDesc']);
				// 	$('#pID').attr('value',arr['pro']['pID']);		
				},
				error: function (error) {
					console.log(error);
				}
			});	
		}	
		
	});
});