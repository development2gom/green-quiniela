$(document).ready(function () {
    //aqui comiensa la accion para la clase  js-equipos
    $(".js-submit").change(function () {
        // se agrega el contenido a variables 

        if( $(this).prop('checked') ) {
            var partido = $(this).data("partido");
        var formulario = $('#form-ajax-'+partido).serialize();
        $.ajax({
            url: baseUrl+'administrador/guardar-partidos-nuevos',
            type: 'post',
            data:
                formulario,
        });
        console.log('formulario');
        }
       





    })
});
