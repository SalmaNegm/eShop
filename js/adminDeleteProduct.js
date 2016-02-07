$(function(){

	function drawSearchList()
	{
		d={};
		d.op='searchList';
		// alert(d.selected_pID);
		$.ajax
			({
				url: "../admin/adminDeleteProduct_server.php",
				type: 'GET',
				dataType: 'html',
				data: d,
				success: function (responce) {
					allPro=$.parseJSON(responce);
					$('#browsers').empty();
					$.each(allPro,function(idx,pro){
						$('#browsers').append("<option value='"+pro['pName']+"' data-pid='"+pro['pID']+"'>"+pro['pID']+"</option>");
					});
				},
				error: function (error) {
					console.log(error);
				}
			});	
	}
	$('#viewer').hide();
	$('#search_btn_delete').on("click",function(){
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
			d={};
			d.selected_pID=$('#browsers option[value='+$('#tt').val()+']').attr('data-pid');
			// alert(d.selected_pID);
			$.ajax
			({
				url: "../admin/adminDeleteProduct_server.php",
				type: 'GET',
				dataType: 'html',
				data: d,
				success: function (responce) {
					arr=$.parseJSON(responce);
					$('#searchError').text('');
					$('#viewer').show();
					$('#hidden_pID').attr('value',arr['pro']['pID']);
					$('#insert_pName').text(arr['pro']['pName']);
					$('#cNames_menu_edit').text(arr['cName']);
					$('#scNames_menu_edit').text(arr['scName']);
					$('#insert_pPrice').text(arr['pro']['pPrice']);
					$('#insert_pQuantity').text(arr['pro']['pQuantity']);
					$('#dispImg').attr('src',arr['pro']['pImg']);
					$('#insert_pDesc').text(arr['pro']['pDesc']);
					$('#pID').attr('value',arr['pro']['pID']);		
				},
				error: function (error) {
					console.log(error);
				}
			});	
		}
	});

	$('input[name=delete_ok]').on('click',function(event){
		
		event.preventDefault();
		d={};
		d.pID=$('#pID').attr('value');
		// alert(d.selected_pID);
		$.ajax
			({
				url: "../admin/adminDeleteProduct_server.php",
				type: 'GET',
				dataType: 'html',
				data: d,
				success: function (responce) {
					$('#viewer').hide();
					$('#tt').val('');
					drawSearchList();
				},
				error: function (error) {
					console.log(error);
				}
			});	

	});
});