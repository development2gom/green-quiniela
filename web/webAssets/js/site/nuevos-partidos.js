$(document).ready(function () {
    //aqui comiensa la accion para la clase  js-equipos
    $(".js-submit").on("click", function () {
        // se agrega el contenido a variables 
        var partido = $(this).data("partido");
        var formulario = $('#form-ajax-' + partido).serialize();
        $.ajax({
            url: 'http://localhost:81/clientes/green/green-quiniela/web/administrador/guardar-partidos-nuevos',
            type: 'post',
            data:
                formulario,

        });
        console.log(formulario);





    })
});
