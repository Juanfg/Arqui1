$( document ).ready(function() {
   
	$("#crear").click(function(){
		var url = "clientes/create";
		$(location).attr('href',url);
	});

	$(".editar").click(function(){
		var id = $(this).closest('tr').attr('data-id');
		var url = "clientes/" + id + "/edit";
		$(location).attr('href',url);
	});

	$(".borrar").click(function(){
		var id = $(this).closest('tr').attr('data-id');
		var r = confirm("Estas seguro de que deseas borrar a este cliente. Esto no se puede deshacer");
		if (r) {
			$(this).closest('tr').fadeOut();
			$.post('clientes/' + id, { _method : "DELETE", _token: $('#crsf').html() }, function(response){
				if(response.success)
					$(this).closest('tr').remove();
				else{
					alert("Lo siento. No pude eliminar, comunicate con soporte tecnico");
					$(this).closest('tr').fadeIn();
				}
			}).fail(function(){
				alert("Lo siento. No pude eliminar, comunicate con soporte tecnico");
				$(this).closest('tr').fadeIn();
			});
		   
		}
	});

	$("#done").click(function(){
		var url = "/clientes";
		$(location).attr('href',url);
	});
	
});