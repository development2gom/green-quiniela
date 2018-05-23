<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = "Dashboard";

$this->params['classBody'] = "site-navbar-small sec-bienvenido";
?>

<div class="sb-pasos">
    <div class="sb-pasos-title">
        <h2>Pasos para participar:</h2>
    </div>
    <div class="sb-pasos-body">
        <ul>
            <li><strong>Compra.</strong> Realiza dos compras, de $1,000 c/u.</li>
            <li><strong>Acude.</strong> Asiste a uno de los 5 módulos de atención dentro de Centro Santa Fe.</li>
            <li><strong>Presenta.</strong> Presenta tus tickets de compra y recibe tu código de participación.</li>
            <li><strong>Registra.</strong> Realiza tu registro e inserta tu código.</li>
            <li><strong>Completa.</strong> Realiza dos compras, de $1,000 c/u.</li>
        </ul>
        <a href="<?=Url::base()?>/sign-up" class="btn btn-primary">Regístrate</a>
    </div>
</div>