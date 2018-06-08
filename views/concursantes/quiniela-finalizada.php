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
            Muchas gracias por participar. Consulta a los ganadores de cada fase
        </p>
        <?php 
        foreach($fases as $fase){
        ?>
        <div class="sb-ganador-lugar">
                <a class="btn btn-primary btn-lugar" href="<?=Url::base()?>/concursantes/ganadores?token=<?=$fase->txt_token?>"><?=$fase->txt_nombre_fase?></a>
            </div>
        <?php 
        }
        ?>
    </div>
    
</div>
        
