<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = "Finalizado";
$this->params['classBody'] = "site-navbar-small sec-finalizado";

$this->registerJsFile('@web/webAssets/js/site/proximos-partidos.js',
    ['depends'=>[\app\assets\AppAsset::className()]]);
?>

<div class="sf-participar">
    <img class="sf-participar-img" src="<?=Url::base()?>/webAssets/images/LOGO-QUINIELA-MUNDIALISTA-01.png" alt="">
    <div class="sf-participar-title">
        <h2>¡Gracias <span>por participar!</span></h2>
        <h3>Te deseamos mucha suerte</h3>
    </div>
    <div class="sf-participar-body">
        <p class="text-codigo">Código para activar</p>
        <span class="text-fase">Siguiente fase</span>
        <input class="codigo js-codigo" type="text">
        <span class="js-status-codigo"></span>

        <div class="form-group">
            <button class="btn btn-primary js-avanzar" data-url="<?=Url::base()?>">Avanzar</button>
        </div>
    </div>
</div>