$(document).ready(function(){
    //aqui comiensa la accion para la clase  js-equipos
    $(".js-submit").on("click",function(){
        // se agrega el contenido a variables 
        var partido=$(this).data("partido");
        var formulario=$('#form-ajax-'+partido).serialize();
       
        console.log(formulario);
        
        swal({
            title: "Espera",
            text: "¿Esta seguro de guardar el resultado seleccionado:?",
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
                url:'http://localhost:81/clientes/green/green-quiniela/web/administrador/guardar-partidos-nuevos',
                type: 'post',
                data:
                formulario,
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
