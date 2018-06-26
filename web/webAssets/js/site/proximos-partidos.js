//recibe la variable
$(document).ready(function () {

    $(".selector").on("click", function () {
        descargarPDF(elemento);
    });

    $(".js-equipo").on("click", function () {
        //console.log($(this).data('token'));
        var token = $(this).data('partido');
        var equipo_seleccionado = $(this).data('token');
        var resultado = $(this).data('nombre');
        var url = $(".text-completa-registra").data('url');

        // se verifica si la variable esta bacia
        /*if (!equipo_seleccionado) {
            equipo_seleccionado = null;
        }*/
        var contenedor = $('#js-div-partido-'+token+' .active').removeClass('active');

        // var padre = $(this).parent();
        // padre.toggleClass('active');

        $(this).toggleClass('active');


        $.ajax({
            url: url + '/concursantes/guardar-resultados',
            type: 'post',
            data: {
                token: token,
                equipo_seleccionado: equipo_seleccionado
            },
            success: function (resultado) {
                if (resultado.status == 'success') {
                    //swal('Correcto', 'Resultados guardados con exito', 'success');
                    $("#js-div-partido-" + token).removeClass('js-partido-no-contestado');
                }
                else {
                    swal('Espera', resultado.message, 'error');
                }
                gruposFaltantes();

            },
            error: function () {
                swal('Espera', 'Ocurrio un problema al guardar el resultado', 'error');
            }

        });
    });

    $(".js-verificar-siguiente").on('click', function () {
        var url = $(this).data('url');
        var sinContestar = $(".js-partido-no-contestado");
        var padre = $(this).parent();
        var hijo = padre.find('.js-span-finalizado');
        gruposFaltantes();

        if (sinContestar.length > 0) {
            swal('Espera', 'Falta por contestar ' + sinContestar.length + ' partidos', 'warning');
        } else {

            hijo.addClass("active");
            window.location.href = url + "/concursantes/finalizado";
        }
    });

    $('.js-avanzar').on('click', function () {
        var codigo = $('.js-codigo').val();
        var url = $(this).data('url');

        $.ajax({
            url: url + "/concursantes/verificar-codigo",
            type: 'POST',
            data: { codigo: codigo },
            success: function (resp) {
                $(".js-status-codigo").html(resp.message);
                gruposFaltantes();
            },
            error: function () {

            }
        });
    });

    gruposFaltantes();



});

function gruposFaltantes() {

    $(".panel-heading").each(function (index) {
        var elemento = $(".panel-collapse:eq(" + index + ") .js-partido-no-contestado").size();
        if (elemento == 0) {
            $(this).addClass("active");
        }
    });



}

function aparecerLabelTerminar(mensaje) {
    $(".js-span-finalizado").addClass("active");

    $(".js-span-finalizado").text(mensaje);
}

var widthPaper = 210;
var heightPaper = 295;
function calcularFactor($ancho, $alto, $redimension) {
    var factor = 0;
    if ($ancho >= $alto) {
        factor = $redimension / $ancho;
    } else if ($ancho <= $alto) {
        factor = $redimension / $alto;
    }
    
    return factor;
}


function descargarReportePDF(identificador,nombre){

    var w = 1000;
    var h = 1000;
    var div = document.querySelector(identificador);
    
    html2canvas(div).then(function(canvas) {

        var widthPreguntas = canvas.width;
        var heightPreguntas = canvas.height;
        var dataURLPreguntas = canvas.toDataURL();

        if(widthPreguntas >= widthPaper){
            var factor = calcularFactor(widthPreguntas, heightPreguntas, widthPaper-20);
            widthPreguntas = widthPreguntas * factor;
            heightPreguntas = heightPreguntas * factor;
        }

        // var chart = $(graficaIdentificador).get(0);
        // var widthGrafica = chart.width;
        // var heightGrafica = chart.height;
        // var dataURL = chart.toDataURL();

        // if(widthGrafica >= widthPaper){
        //     var factor = calcularFactor(widthGrafica, heightGrafica, widthPaper/2);
        //     widthGrafica = widthGrafica * factor;
        //     heightGrafica = heightGrafica * factor;
        // }
       
        var pdf = new jsPDF("p", "mm",[widthPreguntas, heightPreguntas]);
        //
        pdf.addImage(dataURLPreguntas, "PNG", 0, 0, widthPreguntas, heightPreguntas);
        //pdf.addPage();
        //pdf.addImage(dataURL, "PNG", 10, 10, widthGrafica, heightGrafica);
        //pdf.addImage(dataURL, "PNG", 10, 10);
    
        pdf.save(nombre+".pdf");

        $("body").append(canvas);
       
    });

    return false;
}
