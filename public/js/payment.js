$( document ).ready(function() {

    $(".button").click(function(){
        $('*').removeClass('bk-clr-three');
        $(this).addClass('bk-clr-three');

    });

    $("#comprar").click(function() {
        var folios = $('.bk-clr-three').attr('data-id');
        var params = $(':input').serializeArray();
        var using = [];
        using['folios'] = folios;
        using['_method'] = 'POST';
        $.each(params, function(key,value){
            using[value.name] = value.value;
        });

        $.post('/payment', using, function(response){
            console.log(response);
            if (response.success)
            {
                alert('ok');
            }
            else
            {
                alert('oh no');
            }
        }).fail(function(){
            alert("Lo siento. No pude comprar folios, comunicate con soporte tecnico");
        });
    });
});