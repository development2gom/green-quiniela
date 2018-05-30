<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = "Quiniela mundialista";

$this->params['classBody'] = "site-navbar-small sec-bienvenido";
?>

<div class="sb-pasos">
    <div class="sb-pasos-title">
        <h2>Pasos para participar:</h2>
    </div>
    <div class="sb-pasos-body">
        <ul>
            <li><strong>Compra.</strong> En Centro Santa Fe.</li>
            <li><strong>Presenta.</strong> Los tickets en cualquier módulo de atención.</li>
            <li><strong>Recibe.</strong> Un código de participación.</li>
            <li><strong>Ingresa.</strong> A www.mundialcentrosantafe.com.</li>
            <li><strong>Juega.</strong> En la quiniela mundialista.</li>
            <li><strong>Realiza.</strong> Más compras y sigue participando.</li>
            <li>Si logras el mejor puntaje al final de cada jornada ¡GANAS!.</li>
        </ul>
        <p>*Aplica restricciones, consulta términos y condiciones.</p>
        <div class="sb-pasos-actions">
            <a href="<?=Url::base()?>/sign-up" class="btn btn-primary">Regístrate</a>
            <a href="<?=Url::base()?>/login" class="btn btn-primary">Inicia sesión</a>
            <a href="<?=Url::base()?>/concursantes/ganadores" class="btn btn-primary">Ganadores</a>
        </div>
    </div>
</div>