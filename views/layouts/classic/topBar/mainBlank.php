<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use app\assets\AppAssetClassicTopBarBlank;
use yii\helpers\Url;

AppAssetClassicTopBarBlank::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="<?= Yii::$app->language ?>">
<!-- Etiqueta head -->
<?=$this->render("//components/head")?>
<body class="animsition <?=isset($this->params['classBody'])?$this->params['classBody']:''?>">
  
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    
  <?php $this->beginBody();?>
  

  <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
      <?=$content?>
    </div>
  </div>  

  <?=$this->render("//components/classic/topbar/footerBlank")?>

  <?php $this->endBody();?>

<!-- Modal -->
<div class="modal fade modal-fade-in-scale-up" id="modal-terminos-condiciones" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
<div class="modal-dialog modal-simple">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
<h4 class="modal-title">Términos y condiciones</h4>
</div>
<div class="modal-body">
<p>Lorem ipsum</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary" id="btn-acepto-terminos">Acepto terminos</button>
</div>
</div>
</div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div class="modal fade modal-fade-in-scale-up" id="modal-aviso-privacidad" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-simple">
    <div class="modal-content page-aviso">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
        <h3 class="page-aviso-title">Aviso de Privacidad</h3>
      </div>
      <div class="modal-body page-aviso-body">
        <h3>ADMINISTRADORA DE CENTROS COMERCIALES SANTA FE, S.A. DE C.V.</h3>

        <p>
          El presente Aviso de Privacidad<span class="num-pos"><small>1</small></span> se emite en cumplimiento con lo dispuesto en los artículos 6, 8, 15 y 16 de la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (en lo sucesivo la <span class="bold">“Ley”</span>).
        </p>

        <p>
          Administradora de Centros Comerciales Santa Fe, S.A. de C.V. (en lo sucesivo “ACFE”), está comprometida con la transparencia, seguridad y privacidad de los Datos Personales2 de nuestros clientes, proveedores y usuarios. Al recopilar y tratar3 sus Datos Personales, ACFE, se compromete y obliga a observar y cumplir los principios de licitud, consentimiento, calidad, información, finalidad, lealtad, proporcionalidad y responsabilidad previstos en la Ley (artículo 6).
        </p>

        <p>
          De acuerdo a lo anterior, el presente Aviso de Privacidad aplica a todo tipo de información, incluyendo la relativa a Datos Personales Sensibles4 de nuestros clientes, proveedores y usuarios, así como de terceros con los que ACFE pretenda iniciar una relación contractual, o cualesquier otro. Por lo antes mencionado, y al momento de leer el presente Aviso de Privacidad, usted otorga su consentimiento a ACFE, para que recopile, utilice y transfiera sus Datos Personales para los fines que más adelante se especifican.
        </p>

        <p>Con el objeto de dar cumplimiento a lo establecido en el Artículo 16 de la Ley se señala lo siguiente:</p>

        <h4>IDENTIDAD Y DOMICILIO DE ACFE:</h4>

        <p>
          ACFE es una sociedad mercantil debidamente constituida conforme a las leyes de los Estado Unidos Mexicanos, con domicilio para efectos del presente Aviso de Privacidad, en Avenida Vasco de Quiroga 3800, 2o nivel, junto a El Palacio de Hierro, Colonia Antigua Mina la Totolapa, Cuajimalpa, 05109, en México Distrito Federal.
        </p>

        <p>
          En términos del Artículo 30 de la Ley, toda comunicación relacionada con el presente Aviso de Privacidad deberá dirigirse al departamento de Centro de Atención, designado por ACFE como responsable de la recopilación, tratamiento así como de las solicitudes relacionadas con el acceso, rectificación, cancelación u oposición de los Datos Personales.
        </p>

        <h4>FINALIDAD</h4>

        <p>
          La finalidad de la recopilación y tratamiento de los Datos Personales incluyendo en algunos casos, Datos Personales Sensibles, es ofrecer a nuestros usuarios, clientes y proveedores, una mejor comunicación y difusión de las políticas y normas generales de operación en relación con las áreas de administración y fianzas, comercialización, atención al cliente, mercadotécnica, entre otras. Entre la información que ACFE pudiera solicitar, se encuentra de manera enunciativa más no limitativa: nombre completo, número telefónico, correo electrónico, compañía a la que pertenece, domicilio.
        </p>

        <h4>OPCIONES Y MEDIOS QUE ACFE PONE A SU DISPOSICIÓN PARA LIMITAR EL USO O DIVULGACIÓN DE SUS DATOS PERSONALES</h4>

        <p>
          ACFE cuenta con las medidas de seguridad, administrativas, técnicas y físicas necesarias e implementadas conforme a sus políticas y procedimientos de seguridad, para asegurar sus Datos Personales contra un uso indebido o ilícito, un acceso no autorizado, o contra la pérdida, alteración, robo o modificación de sus Datos Personales, quedando prohibido su divulgación ilícita y limitando su tratamiento conforme a lo previsto en el presente Aviso de Privacidad y en la legislación aplicable.
        </p>

        <h4>MEDIOS PARA EJERCER SUS DERECHOS ARCO<span class="num-pos"><small>5</small></span></h4>

        <p>
          Usted, como titular de los Datos Personales, puede ejercer frente a ACFE, cualquiera de los derechos de acceso, rectificación, cancelación y oposición (en lo sucesivo Derechos ARCO) contemplados en el artículo 22 de la Ley y que se explican a continuación, en el entendido que cada uno de estos derechos es independiente entre sí, es decir, no es necesario agotar uno para ejercer alguno de los otros tres:
        </p>

        <ul>
          <li><span class="bold">A</span>cceso: facultad que tiene de solicitar a ACFE que le informe si en sus Bases de Datos6 tiene alguno de sus Datos Personales.</li>
          <li><span class="bold">R</span>ectificación: derecho que tiene para que se corrijan los Datos Personales que se encuentren en posesión de ACFE, para ello, es posible que le solicitemos la presentación de documentación que acredite las correcciones que solicita.</li>
          <li><span class="bold">C</span>ancelación: facultad que tiene de solicitar, una vez que termine la relación con ACFE, la cancelación de sus Datos Personales en posesión de ACFE.</li>
          <li><span class="bold">O</span>posición: facultad que tiene de solicitar a ACFE que se abstenga de realizar el tratamiento de sus Datos Personales en determinadas situaciones. No obstante, ACFE no estará obligada a suspender el tratamiento de los datos en los supuestos señalados en la Ley.</li>
        </ul>

        <p>
          Las solicitudes para el ejercicio de sus derechos ARCO deberán presentarse por escrito a ACFE en el domicilio señalado en el presente Aviso de Privacidad. Su solicitud deberá contener al menos: (i) su nombre y domicilio o medio para recibir comunicaciones; (ii) su identificación o documentos que acrediten la personalidad de su representante legal; (iii) la explicación clara y precisa de los Datos Personales a los cuales quieres tener acceso, rectificar, cancelar u oponerse; y (iv) cualquier otro elemento o documento que facilite la localización de sus Datos Personales.
        </p>

        <h4>TRANSFERENCIA DE DATOS PERSONALES</h4>

        <p>
          ACFE podrá transferir sus Datos Personales únicamente a las siguientes personas y/o entidades, en el entendido que deberá asegurarse que dichas personas y/o entidades guarden estricta confidencialidad respecto de la información proporcionada:
        </p>

        <ul>
          <li>
            Las empresas controladoras, subsidiarias o afiliadas de Grupo CAABSA en México o en el extranjero.
          </li>
          <li>
            Terceros proveedores de servicios para el cumplimiento de las obligaciones legales, contables, regulatorias o contractuales a cargo de ACFE o de cualquiera de sus empresas controladoras, subsidiarias o afiliadas del Grupo CAABSA en México o en el extranjero.
          </li>
          <li>
            Terceros con fines de mercadotecnia, tecnologías de la información, operación, administración, comercialización y otros fines análogos y lícitos.
          </li>
        </ul>

        <h4>MODIFICACIONES AL AVISO DE PRIVACIDAD</h4>

        <p>
          Cualquier modificación al presente Aviso de Privacidad le será informado indistintamente, mediante avisos en las oficinas de ACFE, correo electrónico o a través de los portales de internet de ACFE.
        </p>

        <hr>

        <ul class="ul-style-simple">
          <li>
            <span class="num-pos"><small>1</small></span>La Ley define Aviso de Privacidad como el documento físico, electrónico o en cualquier otro formato generado por el responsable que es puesto a disposición del titular, previo al tratamiento de sus Datos Personales.
          </li>
          <li>
            <span class="num-pos"><small>2</small></span>La Ley define Datos Personales como cualquier información concerniente a una persona física identificada o identificable.
          </li>
          <li>
            <span class="num-pos"><small>3</small></span>El tratamiento de Datos Personales se refiere a cualquier operación que se realice con sus Datos Personales, desde su obtención, uso, divulgación, almacenamiento y hasta su cancelación y supresión.
          </li>
          <li>
            <span class="num-pos"><small>4</small></span>La Ley define Datos Personales Sensibles como aquellos Datos Personales que afecten a la esfera más íntima de su titular, o cuya utilización indebida pueda dar origen a discriminación o conlleve un riesgo grave para éste.
          </li>
          <li>
            <span class="num-pos"><small>5</small></span>Conforme al artículo cuarto transitorio de la Ley, se le informa que sus derechos ARCO se podrán ejercitar a partir del 1° de enero de 2012.
          </li>
          <li>
            <span class="num-pos"><small>6</small></span>Base de Datos es el conjunto ordenado de Datos Personales.
          </li>
        </ul>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->

  <script>
  (function(document, window, $) {
    'use strict';
    var Site = window.Site;
    $(document).ready(function() {
      Site.run();
    });
  })(document, window, jQuery);
  </script>
</body>
</html>
<?php $this->endPage() ?>
