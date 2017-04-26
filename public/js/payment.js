$( document ).ready(function() {

    $(".button").click(function(){
        $('*').removeClass('bk-clr-three');
        $(this).addClass('bk-clr-three');

    });

    $("#comprar").click(function() {
        var folios = $('.bk-clr-three').attr('data-id');
        var params = $(':input').serializeArray();
        var using = {};
        using['folio'] = folios;
        using['_method'] = 'POST';
        $.each(params, function(key,value){
            using[value.name] = value.value;
        });

        var r = confirm("Estas seguro de que deseas realizar la transaccion?");
        if (r){
            $.post('/payment', using, function(response){
                $('.messages').html("");
                if (response.success)
                {
                    $('.panel-body span').text(response.usuario_folios);
                    $('.messages').prepend("<div class='alert alert-success'><a class='close' data-dismiss='alert' aria-label='close'>&times;</a>Pago exitoso! Gracias por su compra.</div>")
                }
                else
                    $('.messages').prepend("<div class='alert alert-danger'><a class='close' data-dismiss='alert' aria-label='close'>&times;</a>Hubo un problema con su pago. Revise bien sus datos.</div>")
            }).fail(function(){
                alert("Lo siento. No pude comprar folios, comunicate con soporte tecnico");
            });
        }
    });
});