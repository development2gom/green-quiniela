//inicia la ejecucion 
$(document).ready(function(){
    //aqui comiensa la accion para la clase  js-equipos
    $(".js-equipos").on("click",function(){
        // se agrega el contenido a variables 
        var partido =$(this).data("token");
        var equipo_ganador =$(this).data("equipo");
        var resultado=$(this).data("nombre");


        var seleccion=('#js-seleccion-'+partido+' .active').removeclass()      


        var padre = $(this).parent();
        padre.toggleClass('active');



        var padre = $(this).parent();
        padre.toggleClass('active');

        var seleccion=('#js-seleccion-'+partido+' .active').removeclass()


        if(!equipo_ganador){
            equipo_ganador = null;
        }
     
       
            $.ajax({
                url:'http://localhost:81/clientes/green/green-quiniela/web/administrador/guardar-actualizacion',
                type: 'post',
                data:{
                    partido: partido,
                    equipo_ganador: equipo_ganador
                    
            
                },
            //     success:function(respuesta){
            // if(respuesta.status == 'success'){
            //     //swal('Correcto','Resultados guardados con exito','success');

            // }
            // else
            // {
            //     //swal('Espera','Ocurrio un problema al guardar el resultado','error');
            // }
            //     },
                
            
            });
    
           // codigo de confirmación exitosa
     

       

    })
});


