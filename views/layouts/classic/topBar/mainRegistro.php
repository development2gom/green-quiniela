<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use app\assets\AppAssetRegistro;
use yii\helpers\Url;
AppAssetRegistro::register($this);
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



  <div class="red-balon">
    <img src="<?=Url::base()?>/webAssets/images/RED_BALON.png" alt="">
  </div>

  <div class="pasto-verde-inferior-izquierda">
    <img src="<?=Url::base()?>/webAssets/images/PASTO-VERDE_INF_IZQ.png" alt="">
  </div>

  <div class="pasto-verde">
    <img src="<?=Url::base()?>/webAssets/images/PASTO-INFERIOR.png" alt="">
  </div>

  <?php $this->beginBody();?>
  

  <div class="page-registro vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">

      <div class="registro-logo">
          <a class="registro-link" href="<?=Url::base()?>/site/">
            <img class="registro-img" src="<?=Url::base()?>/webAssets/images/LOGO-QUINIELA-MUNDIALISTA_AZUL.png" alt="">
          </a>
      </div>
      

      <?=$content?>
    </div>
  </div>  

  <?=$this->render("//components/classic/topbar/footerBlank")?>

  <?php $this->endBody();?>

  <?=$this->render("//components/classic/topbar/modals")?>


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
