//recibe la variable
$(document).ready(function(){
    $(".js-equipo").on("click",function(){
//console.log($(this).data('token'));
var token=$(this).data('partido');
var equipo_seleccionado =$(this).data('token');
if(!equipo_seleccionado){
    equipo_seleccionado = null;
}

//envia la bariable a otro lado
$.ajax({
    url:'http://localhost:81/clientes/green/green-quiniela/web/concursantes/guardar-resultados',
    type: 'post',
    data:{
        token:token,
        equipo_seleccionado: equipo_seleccionado
        

    },
    success:function(respuesta){
console.log(respuesta);
    },
    error: function()
    {

    }

});

    });

});

