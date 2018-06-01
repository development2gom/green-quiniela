<?php
use yii\helpers\Url;
use app\models\Calendario;
use app\models\WrkQuiniela;
$this->title = "Quiniela mundialista";
$this->params['classBody'] = "site-navbar-small sec-concursante";

$this->registerJsFile('@web/webAssets/js/site/proximos-partidos.js',
['depends'=>[\app\assets\AppAsset::className()]]);

?>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="finalizado-gracias">
            <p data-url="<?= Url::base() ?>">
            Aún no inicia la fase "<?=$proximaFase->txt_nombre_fase?>"
            </p>
            <h5>Podrás completar y registrar tus predicciones de esta fase del <?=Calendario::getDateComplete($proximaFase->fch_inicio)?> al 
            <?=Calendario::getDateComplete($proximaFase->fch_termino)?></h5>
        </div>
    </div>

</div>
