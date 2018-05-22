var inputFile = $("#entusuarios-image");
var tamanioAdmitido = 3;
var tipoImagenesAdmitidas = ["image/jpeg", "image/png", "image/jpg", "image/gif"];
$(document).ready(function () {
    $(".js-img-avatar").on("click", function (e) {
        e.preventDefault();
        inputFile.trigger("click");
    });

    inputFile.on("change", function (e) {
        var file = this.files[0];
        if (!validarTipoImagen(file))
            return false

        if (!validarTamanioImagen(file))
            return false
            
        colocarImagen(file);

    });


    $("#check-terminos").change(function() {

        if($(this).is(':checked')){
            console.log('if');
            $(".checkbox-mask").hide();
        }
        else{
            $(".checkbox-mask").show();
            console.log('else');
        }

    });

    $("#check-terminos").on('click', function() {

        if($(this).is(':checked')){
            console.log('click if');
            $(".checkbox-mask").hide();
        }
        else{
            $(".checkbox-mask").show();
            console.log('click else');
        }

    });

    $("#btn-acepto-terminos").on('click', function() {

        $(".checkbox-mask").hide();
        $("#check-terminos").prop( "checked", true );
        $("#modal-terminos-condiciones").modal("hide");
        console.log("acepto terminos");

    });

    $(".checkbox-mask").on('click', function() {

        console.log("mask");
        $("#modal-terminos-condiciones").modal();

    });

    $(document).on({
        'click':function(e){
            e.preventDefault();
           
            console.log("mask");
            $("#modal-terminos-condiciones").modal();
              
        }
    }, '.checkbox-mask');

    // Al campo de texto telefono validara solo numeros
	$('#entusuarios-txt_telefono').keydown(function (e) {
		validarSoloNumeros(e);
	});
});

function validarTipoImagen(jsfile) {
    var file = jsfile;
    var imagefile = file.type;
    var match = tipoImagenesAdmitidas;

    if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]) || (imagefile == match[3]))) {
        swal("Espera", "Solo se admiten archivos con extensión .jpeg, .jpg, .png, .gif", "warning");
        return false;
    }

    return true;
}

function validarTamanioImagen(jsfile) {
    var file = jsfile;
    sizeImage = (file.size) / 1048576;

    if (sizeImage > tamanioAdmitido) {
        swal("Espera", "Tu imagen debe ser menor a " + tamanioAdmitido + "MB", "warning");
        return false;
    }
    return true;
}

function colocarImagen(jsfile) {
    var file = jsfile;
    var reader = new FileReader();

    // Set preview image into the popover data-content
    reader.onload = function (e) {

        $('.js-image-preview').load(function () {

        }).attr('src', e.target.result);
    }
    reader.readAsDataURL(file);
}

/**
 * Valida que cuando se aprieta un boton sea solo números
 *
 * @param e
 */
function validarSoloNumeros(e) {
	// Allow: backspace, delete, tab, escape, enter and .
	if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
		// Allow: Ctrl+A, Command+A
		(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
		// Allow: home, end, left, right, down, up
		(e.keyCode >= 35 && e.keyCode <= 40)) {
		// let it happen, don't do anything
		return;
	}
	// Ensure that it is a number and stop the keypress
	if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57))
		&& (e.keyCode < 96 || e.keyCode > 105)) {
		e.preventDefault();
	}
}