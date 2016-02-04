$(function(){
	$('#btnBUY').on('click',function(){
		arr = $('#totalPrice').text().split('L');
		d={};
		d.total=parseInt($.trim(arr[0]));

		$.ajax
			({
				url: "buy_server.php",
				type: 'GET',
				dataType: 'html',
				data: d,
				success: function (responce) 
				{
					if(responce!='done')
					{
						$('#buyError').text(responce);
					}	
					else
					{
						$('#main_content').empty();
						$('#main_content').append("<span class='success'>We wish to gain your satisfaction. you successfully purchsed your cart</sapn>");

					}
				},
				error: function (error) {
					console.log(error);
				}
			});	
	});

	$('body').delegate('input[type=number]','change',function(){
		d={};
		d.proID=$(this).parent().parent().attr('value');
		d.Quantity=$(this).val();
		// alert(d.selected_pID);
		$.ajax
			({
				url: "../customer/buy_server.php",
				type: 'GET',
				dataType: 'html',
				data: d,
				success: function (responce) 
				{
					arr=$.parseJSON(responce);
					total=0;
					$('.subTotal').each(function(){
						quan=parseInt(arr[$(this).parent().attr('value')]);
						pri=parseInt($(this).siblings('.price').text().split(' '));
						$(this).text(quan*pri+' L.E');
						total+=quan*pri;
					});
					$('#totalPrice').text(total+' L.E');	
				},
				error: function (error) {
					console.log('fkjjkjk');
				}
			});	
	});

	$('body').delegate('.cartRemove','click',function()
	{
		 // pID=$(this).attr('value');
		// Quantity=$(this).parent().siblings('.Q').children().first().val();

		// $.get('buy_server.php',{'pID':pID});
		d={};
		d.pID=$(this).attr('value');
		// alert(d.selected_pID);
		$.ajax
			({
				url: "buy_server.php",
				type: 'GET',
				dataType: 'html',
				data: d,
				success: function (responce) {
					if(responce=='1')
					{
						$('tr[value='+d.pID+']').next().remove();
						$('tr[value='+d.pID+']').remove();
					}	

				},
				error: function (error) {
					console.log('fkjjkjk');
				}
			});	
	});
});