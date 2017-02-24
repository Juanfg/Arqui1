$( document ).ready(function() {
   
	$("#crear").click(function(){
		var url = "/productos/create";
		$(location).attr('href',url);
	});

	$(".editar").click(function(){
		var id = $(this).closest('tr').attr('data-id');
		var url = "productos/" + id + "/edit";
		$(location).attr('href',url);
	});

	$(".borrar").click(function(){
		$(this).closest('tr').attr('data-id');
		var r = confirm("Estas seguro de que deseas borrar a este producto. Esto no se puede deshacer");
		if (r) {
		    $(this).closest('tr').fadeOut();
		}
	});

	$("#done").click(function(){
		var url = "/productos";
		$(location).attr('href',url);
	});
	
});