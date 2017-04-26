$( document ).ready(function() {
   	
	$("#cliente").change(function(){

		var value = $(this).val();
		if(value == -1)
			$('#datos-cliente').find('input').val('');
		else{

			$.get('/clientes/' + value, {}, function(data){
				var container = $('#datos-cliente');
				setValue(container, 'nombre', data.razon_social);
				setValue(container, 'rfc', data.rfc);
				setValue(container, 'direccion', data.direccion.calle);
				setValue(container, 'exterior', data.direccion.num_ext);
				setValue(container, 'interior', data.direccion.num_int);
				setValue(container, 'colonia', data.direccion.colonia);
				setValue(container, 'cp', data.direccion.cp);
				setValue(container, 'delegacion', data.direccion.delegacion);
				setValue(container, 'municipio', data.direccion.municipio);
				setValue(container, 'estado', data.direccion.estado);
				setValue(container, 'email', data.email);
			});


		}
		
	});

	$("#add").click(function(){
		var cell = $(".base").clone().removeAttr('hidden').removeClass('base');
		cell.find(':input').removeClass('ignored');
		$(".base").after(cell);
		$(".rm_product").off('click').click(deleteCell);
		$("[name='producto[]']").off('change').change(updateProduct);
	});

	$("#done").click(function(){

		$('.has-error').removeClass('has-error');

		$('#errors').attr('hidden', 'hidden');
		var invalidItems = $('select').filter(function(){return this.value ==-1}).not('.ignored');

		if(invalidItems.length){
			invalidItems.closest('div').addClass('has-error');
			return;
		}

		var data = $(':input').not('.ignored').serialize();
		$.post('/facturas', data, function(response){
			console.log(response);
			if(!response.success){
				var errors = $('#errors');
				errors.html('');
				
				Object.keys(response.errors).forEach(function (key) {
					errors.append(response.errors[key] + '<br>');
				});

				errors.removeAttr('hidden');
			}
			else{
				var url = "/facturas";
				$(location).attr('href',url);
			}
		});	
		
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
		    cancelaFactura($(this).closest('tr'));
		}
	});
	
	$(".mostrar").click(function(){
		var id = $(this).closest('tr').attr('data-id');
		var url = "/facturas/" + id;
		$(location).attr('href',url);
	});

	function cancelaFactura(row){

		var id = row.attr('data-id');

		$.post('/facturas/' + id, {
			"_method" : "DELETE",
		}, function(response){
			// No hacemos nada, ya ajax se encargo
		}).fail(function(){
			alert("Hubo un fallo y la factura no si cacelo, comunicate a soporte tecnico");
			row.find('.cancelada').html("No");
			row.find('.borrar').fadeIn();
		});
	}

	function setValue(container, inputName, value){
		container.find("input[name='" + inputName + "']").val(value);
	}

	function updateProduct(){
		var value = $(this).val();
		var tr = $(this).closest('tr');
		if(value == -1)
			tr.find('.updatable').text('');
		else{
			$.get('/productos/' + value, {}, function(data){
				tr.find('.unidad').text(data.unidad);
				tr.find('.precio').text("$ " + data.precio);
				tr.find('.iva').text(data.iva ? "Si" : "No");
				tr.find('.ieps').text(data.ieps ? "Si" : "No");
			});
		}
	}

	function deleteCell(){
		$(this).closest('tr').remove();
	}
	
});