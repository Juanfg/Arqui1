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
	
	$(".mostrar").click(function(){
		alert("Por el momento esta funcion no esta disponible");
	});

	function deleteCell(){
		$(this).closest("tr").remove();
	}



	
});