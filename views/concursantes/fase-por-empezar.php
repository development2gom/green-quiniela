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
    <div class="col-md-6 offset-md-3 col-d-flex">
        <p style="color:white;"  data-url="<?= Url::base() ?>">
            Aún no inicia la fase "<?=$proximaFase->txt_nombre_fase?>"
            Podrás completar y registrar tus predicciones de esta fase del <?=Calendario::getDateComplete($proximaFase->fch_inicio)?> al 
            <?=Calendario::getDateComplete($proximaFase->fch_termino)?>.
        </p>
        <h5 style="color:white;">Los resultados serán publicados el <?=Calendario::getDateComplete($proximaFase->fch_premiacion)?></h5>
    </div>

    <?php
    foreach($fasesAnteriores as $faseAnterior){
    ?>
        
    <?php
    }
    ?>
    
</div>