//inicia la ejecucion 
$(document).ready(function(){
    //aqui comiensa la accion para la clase  js-equipos
    $(".js-seleccionar-equipo").on("click",function(){
        // se agrega el contenido a variables 
        var partido =$(this).data("token");
        var equipo_ganador =$(this).data("equipo");
        var resultado=$(this).data("nombre");
        var url = $(".js-div-contenedor").data('url');

        if(!equipo_ganador){
            equipo_ganador = null;
        }
     
        $.ajax({
            url:url+'/administrador/guardar-actualizacion',
            type: 'post',
            data:{
                partido: partido,
                equipo_ganador: equipo_ganador
            },
            success:function(respuesta){
                if(respuesta.status == 'success'){
                    swal('Correcto','Resultados guardados con exito','success');
                }
                else{  
                    swal('Espera','Ocurrio un problema al guardar el resultado','error');
                }
            },
        });
    });
});


