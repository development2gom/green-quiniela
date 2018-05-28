//recibe la variable
$(document).ready(function () {
    $(".js-equipo").on("click", function () {
        //console.log($(this).data('token'));
        var token = $(this).data('partido');
        var equipo_seleccionado = $(this).data('token');
        var resultado = $(this).data('nombre');
        var url = $(".text-completa-registra").data('url');

        //se verifica si la variable esta bacia
        /*if (!equipo_seleccionado) {
            equipo_seleccionado = null;
        }*/
var contenedor= $('#js-div-partido-'+token+' .active').removeClass('active');

        var padre = $(this).parent();
        padre.toggleClass('active');

        $.ajax({
            url: url+'/concursantes/guardar-resultados',
            type: 'post',
            data: {
                token: token,
                equipo_seleccionado: equipo_seleccionado
            },
            success: function (resultado) {
                if (resultado.status == 'success') {
                    //swal('Correcto', 'Resultados guardados con exito', 'success');
                    $("#js-div-partido-"+token).removeClass('js-partido-no-contestado');
                }
                else {
                    swal('Espera', resultado.message, 'error');
                }

            },
            error: function () {
                swal('Espera', 'Ocurrio un problema al guardar el resultado', 'error');
            }

        });
    });

    $("#js-verificar-siguiente").on('click', function(){
        var url = $(this).data('url');
        var sinContestar = $(".js-partido-no-contestado");
        if(sinContestar.length > 0){
            swal('Espera', 'Falta por contestar '+sinContestar.length+' partidos', 'warning');            
        }else{
            window.location.href = url+"/concursantes/finalizado";
        }
    });

    $('.js-avanzar').on('click', function(){
        var codigo = $('.js-codigo').val();
        var url = $(this).data('url');

        $.ajax({
            url: url+"/concursantes/verificar-codigo",
            type:'POST',
            data: {codigo: codigo},
            success: function(resp){
                $(".js-status-codigo").html(resp.message);                
            },
            error: function(){

            }
        });
    });
});

