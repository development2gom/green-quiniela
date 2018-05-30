<?php
use yii\helpers\Url;

$this->title = "Actualizar Partidos";
$this->params['classBody'] = "sec-actualizar-partidos";

$this->registerJsFile('@web/webAssets/js/site/actualizar-partidos.js',
['depends'=>[\app\assets\AppAssetClassicTopBar::className()]]);
?>
<div class="sec-ap-actions">
    <button class="btn btn-primary">GUARDAR</button>
</div>

<div class="sec-ap-cont js-div-contenedor" data-url="<?= Url::base() ?>">
    
    <?php
    foreach ($partidos as $partido) {
    $equipo1 = $partido->equipo1;
    $equipo2 = $partido->equipo2;
    ?>
        <div class="sec-ap-item js-partido-<?=$partido->id_partido?>">
            <div class="sec-ap-item-local">
                <img class="js-seleccionar-equipo" src='<?=$equipo1->txt_url_imagen_equipo;?>' data-nombre="<?=$equipo1->txt_nombre_equipo;?>"  data-token ="<?=$partido->txt_token?>" data-equipo="<?=$partido->id_equipo1?>"/>
                <p><?=  $equipo1->txt_nombre_equipo;?></p>
            </div>
            
            <div class="sec-ap-item-empate">
                <button class='btn btn-secondary js-seleccionar-equipo' data-nombre='Empate' data-token ="<?=$partido->txt_token?>" data-equipo="<?= null ?>">empate</button >
            </div>
            <div class="sec-ap-item-visita">
                <img class="js-seleccionar-equipo" src= '<?=$equipo2->txt_url_imagen_equipo;?>' data-nombre='<?=$equipo2->txt_nombre_equipo?>' data-token ="<?=$partido->txt_token?>" data-equipo="<?=$partido->id_equipo2?>" >
                <p><?= $equipo2->txt_nombre_equipo;?></p>
            </div>
        </div>
    <?php
    }
    ?>
</div>