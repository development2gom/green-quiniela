//inicia la ejecucion 
$(document).ready(function () {
    //aqui comiensa la accion para la clase  js-equipos
  
    $(".js-seleccionar-equipo").on("click",function(){
        // se agrega el contenido a variables 
        var partido =$(this).data("token");
       
       
        var equipo_ganador =$(this).data("equipo");
        var resultado=$(this).data("nombre");
        // var url = $(".js-div-contenedor").data('url');

        var seleccion = $('#js-seleccion-'+partido+' .active').removeClass('active');
        
        // var seleccionado = $(this).parent();
        $(this).addClass('active');

        if (!equipo_ganador) {
            equipo_ganador = null;
        }
     
        $.ajax({
            url:baseUrl+'administrador/guardar-actualizacion',
            type: 'post',
            data:{
                partido: partido,
                equipo_ganador: equipo_ganador
             }
           
        });
    });
      
    $(".js-guardar").on("click", function () {
        swal('Datos guardados con exito');
    })
});


