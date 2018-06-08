<?php
use yii\helpers\Url;
use app\models\Calendario;
use app\models\WrkQuiniela;
$this->title = "Quiniela mundialista";
$this->params['classBody'] = "site-navbar-small sec-finzalidado-gracias";

?>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="finalizado-gracias">
            <p data-url="<?= Url::base() ?>">
            Muchas gracias por participar
            </p>
            <h5>Los resultados serán publicados el <?=Calendario::getDateComplete($fase->fch_premiacion)?></h5>
        </div>
    </div>

</div>