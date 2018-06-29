<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use app\assets\AppAssetConcursante;
use yii\helpers\Url;
AppAssetConcursante::register($this);
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

  <div class="triangulo-naranja">
    <img src="<?=Url::base()?>/webAssets/images/TRIANGULO-NARANJA.png" alt="">
  </div>

  <div class="cuadro-naranja">
    <img src="<?=Url::base()?>/webAssets/images/CUADRO-NARANJA-SUPERIOR.png" alt="">
  </div>

  <div class="logo-25-anos">
    <img src="<?=Url::base()?>/webAssets/images/LOGO-25-ANOS-CSF-01.png" alt="">
  </div>

  <a href="<?=Url::base()?>/" class="logo-quiniela">
    <img src="<?=Url::base()?>/webAssets/images/LOGO-QUINIELA-MUNDIALISTA-01.png" alt="">
  </a>
  <?=$this->render("//components/logout")?>
  <?php $this->beginBody();?>
  

  <div class="page-concursante vertical-align" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
      <?=$content?>
    </div>
  </div>  

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
