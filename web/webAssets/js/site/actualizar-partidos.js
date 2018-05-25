//inicia la ejecucion 
$(document).ready(function(){
    //aqui comiensa la accion para la clase  js-equipos
    $(".js-equipos").on("click",function(){
        // se agrega el contenido a variables 
        var partido =$(this).data("token");
        var equipo_ganador =$(this).data("equipo");
        var resultado=$(this).data("nombre");


        var padre = $(this).parent();
        padre.toggleClass('active');

        if(!equipo_ganador){
            equipo_ganador = null;
        }
        swal({
            title: "Espera",
            text: "¿Esta seguro de guardar el resultado seleccionado:"+resultado+"?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-warning",
            confirmButtonText: "Sí, estoy seguro",
            cancelButtonText: "No, revisaré una vez más",
            closeOnConfirm: true,
            //closeOnCancel: false
        },
        function() {
            $.ajax({
                url:'http://localhost:81/clientes/green/green-quiniela/web/administrador/guardar-actualizacion',
                type: 'post',
                data:{
                    partido: partido,
                    equipo_ganador: equipo_ganador
                    
            
                },
                success:function(respuesta){
            if(respuesta.status == 'success'){
                swal('Correcto','Resultados guardados con exito','success');

            }
            else
            {
                swal('Espera','Ocurrio un problema al guardar el resultado','error');
            }
                },
                error: function()
                {
                    swal('Espera','Ocurrio un problema al guardar el resultado','error');
                }
            
            });
    
           // codigo de confirmación exitosa
        });

       

    })
});


