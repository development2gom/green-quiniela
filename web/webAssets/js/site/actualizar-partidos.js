//inicia la ejecucion 
$(document).ready(function(){
    //aqui comiensa la accion para la clase  js-equipos
    $(".js-equipos").on("click",function(){
        // se agrega el contenido a variables 
        var partido =$(this).data("token");
        var equipo_ganador =$(this).data("equipo");
        var resultado=$(this).data("nombre");
        

console.log(partido);

        var seleccion=$('#js-seleccion-'+partido+' .active').removeClass('active');
        var seleccionado = $(this).parent();
        seleccionado.toggleClass('active');


       


        if(!equipo_ganador){
            equipo_ganador = null;
        }
     
       
            $.ajax({
                url:'http://localhost:81/clientes/green/green-quiniela/web/administrador/guardar-actualizacion',
                type: 'post',
                data:{
                    partido: partido,
                    equipo_ganador: equipo_ganador
                    
            
                }          
            
            });
    
           // codigo de confirmación exitosa
     

       

    })
    $(".js-guardar").on("click",function(){
        
                //swal('Correcto', 'Resultados guardados con exito', 'success');
                $("#js-div-partido-"+token).removeClass('js-partido-no-contestado');
            
        

    })


});


