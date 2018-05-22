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
      <?=$this->render("//components/classic/topbar/footerBlank")?>
    </div>
  </div>  

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
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
<h4 class="modal-title">Aviso de Privacidad</h4>
</div>
<div class="modal-body">
<p>Lorem ipsum</p>
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
