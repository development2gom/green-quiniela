<?php
use yii\helpers\Url;
use app\models\Calendario;
use app\models\WrkQuiniela;
$this->title = "Quiniela mundialista";
$this->params['classBody'] = "site-navbar-small sec-concursante";

?>

<div class="row">
    <div class="col-md-6 offset-md-3 col-d-flex">
        <p style="color:white;"  data-url="<?= Url::base() ?>">
           Muchas gracias por participar
        </p>
        <h5 style="color:white;">Los resultados serán publicados el <?=Calendario::getDateComplete($proximaFase->fch_premiacion)?></h5>
    </div>

</div>