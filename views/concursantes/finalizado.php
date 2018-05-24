<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = "Finalizado";

$this->params['classBody'] = "site-navbar-small sec-finalizado";
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
        <input class="codigo" type="text">

        <div class="form-group">
            <a href="#" class="btn btn-primary">Avanzar</a>
        </div>
    </div>
</div>