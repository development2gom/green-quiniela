//recibe la variable
$(document).ready(function(){
    $(".js-equipo").on("click",function(){
//console.log($(this).data('token'));
var token=$(this).data('partido');
var equipo_seleccionado =$(this).data('token');
var resultado =$(this).data('nombre');

//se verifica si la variable esta bacia
if(!equipo_seleccionado){
    equipo_seleccionado = null;
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
        url:'http://localhost:81/clientes/green/green-quiniela/web/concursantes/guardar-resultados',
        type: 'post',
        data:{
            token:token,
            equipo_seleccionado: equipo_seleccionado
            
    
        },
        success:function(resultado){
            if(resultado.status == 'success'){
                swal('Correcto','Resultados guardados con exito','success');
            }
            else{
                swal('Espera',resultado.message,'error');
            }
   
        },
        error: function()
        {
            swal('Espera','Ocurrio un problema al guardar el resultado','error');
        }
    
    });
});



//envia la bariable a otro lado


    });

});

