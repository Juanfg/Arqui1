$( document ).ready(function() {
   
	$("#add").click(function(){
		var cell = $(".base").clone().removeAttr('hidden').removeClass('base');
		$(".base").after(cell);
		$(".rm_product").off('click').click(deleteCell);
	});

	$("#done").click(function(){
		var url = "/facturas";
		$(location).attr('href',url);
	});

	$("#crear").click(function(){
		var url = "/facturas/create";
		$(location).attr('href',url);
	});

	$(".borrar").click(function(){
		$(this).closest('tr').attr('data-id');
		var r = confirm("Estas seguro de que deseas cancelar esta factura. Esto no se puede deshacer");
		if (r) {
		    $(this).closest('tr').find(".cancelada").html('Si');
		    $(this).fadeOut();
		}
	});
	
	$(".mostrar").click(function(){
		alert("Por el momento esta funcion no esta disponible");
	});

	function deleteCell(){
		$(this).closest("tr").remove();
	}



	
});