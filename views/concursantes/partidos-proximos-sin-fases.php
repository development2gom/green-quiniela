<?php
use yii\helpers\Url;
use app\models\Calendario;
use app\models\WrkQuiniela;
use yii\web\View;

$this->title = "Quiniela mundialista";
$this->params['classBody'] = "site-navbar-small sec-concursante";


$this->registerJsFile(
    'https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js',
    ['depends' => [\app\assets\AppAsset::className()]]
);

$this->registerJsFile(
    '@web/webAssets/js/site/proximos-partidos.js',
    ['depends' => [\app\assets\AppAsset::className()]]
);

?>

<div class="row">
    <div class="col-md-4 col-d-flex">
        <div class="column-textos">
            <p class="text-completa-registra" data-url="<?= Url::base() ?>">
                1. Por cada partido selecciona un campo (equipo ganador o empate) 
            </p>
            <p class="text-completa-registra" data-url="<?= Url::base() ?>">
                2. Completa cada grupo
            </p>
            <p class="text-completa-registra" data-url="<?= Url::base() ?>">
                3. Da click en finalizar para guardar juego.
            </p>
            <h5 class="text-resultados"></h5>
            <p class="text-completa-registra" data-url="<?= Url::base() ?>">Para dudas y aclaraciones comunicate  al  01 800 467 1897</p>
        </div>
    </div>
    <div class="col-md-4">
        
       

        <!-- Accordion -->
        <div class="panel-group panel-group-simple" id="siteMegaAccordion" aria-multiselectable="true" role="tablist">
            <div class="panel-heading" id="siteMegaAccordionHeadingOne" role="tab">
                        <a class="panel-title" data-toggle="collapse" href="#siteMegaCollapseOne" data-parent="#siteMegaAccordion" aria-expanded="false" aria-controls="siteMegaCollapseOne">
                            Fase: <?= $fase->txt_nombre_fase ?>
                        </a>

            </div>
            <div class="panel-collapse collapse" id="siteMegaCollapseOne" aria-labelledby="siteMegaAccordionHeadingOne" role="tabpanel">
                <div class="panel-body">
                <?php
            
            foreach ($partidos as $partido) {

                $user = Yii::$app->user->identity;
                $resultado = WrkQuiniela::find()->where(["id_usuario" => $user->id_usuario, 'id_partido' => $partido->id_partido])->one();

                $equipo1 = $partido->equipo1;
                $equipo2 = $partido->equipo2;//print_r($resultado);exit;//echo "<br/>";print_r($equipo1);exit;
            ?>
                <div id="js-div-partido-<?= $partido->txt_token ?>" class="row no-gutters <?= $resultado ? '' : 'js-partido-no-contestado' ?>">
                    <div class="col-4 col-md-4">

                        <?php 
                        $flagEq1 = false;
                        $flagEq2 = false;
                        $flagEm3 = false;
                        if ($resultado) {
                            if ($equipo1->id_equipo == $resultado->id_equipo_ganador) {
                                $flagEq1 = true;
                            } else if ($equipo2->id_equipo == $resultado->id_equipo_ganador) {
                                $flagEq2 = true;
                            } else {
                                $flagEm3 = true;
                            }
                        } ?>

                        <div class="panel-body-item <?=$terminoPartido?"":"js-equipo"?> <?= $flagEq1 ? 'active' : '' ?>" data-partido ="<?= $partido->txt_token ?>" data-nombre="<?= $equipo1->txt_nombre_equipo ?>" data-token="<?= $partido->id_equipo1 ?>">
                            <p class="panel-body-pais"><?= $equipo1->txt_nombre_equipo; ?></p>
                        
                            <img src='<?= $equipo1->txt_url_imagen_equipo; ?>' data-partido ="<?= $partido->txt_token ?>" 
                            data-nombre="<?= $equipo1->txt_nombre_equipo ?>"
                            data-token="<?= $partido->id_equipo1 ?>"
                            class="panel-body-equipo "/>
                        </div>
                    </div>
                    <div class="col-4 col-md-4 d-flex align-items-center justify-content-center">
                        <div class="panel-body-item-button <?=$terminoPartido?"":"js-equipo"?> <?= $flagEm3 ? 'active' : '' ?>" data-nombre="empate" data-partido ="<?= $partido->txt_token ?>">
                            <button class='btn btn-secondary panel-body-btn'>empate</button >
                        </div>
                    </div>
                    <div class="col-4 col-md-4">
                        <div class="panel-body-item <?=$terminoPartido?"":"js-equipo"?> <?= $flagEq2 ? 'active' : '' ?>" data-partido ="<?= $partido->txt_token ?>" data-nombre="<?= $equipo2->txt_nombre_equipo ?>" data-token="<?= $partido->id_equipo2 ?>">
                            <p class="panel-body-pais"><?= $equipo2->txt_nombre_equipo; ?></p>

                            <img src= '<?= $equipo2->txt_url_imagen_equipo; ?>'  data-partido ="<?= $partido->txt_token ?>" 
                            data-nombre="<?= $equipo2->txt_nombre_equipo ?>"
                            data-token="<?= $partido->id_equipo2 ?>"
                            class="panel-body-equipo">
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>
                </div>
            </div>    
            

        </div>
        <!-- End Accordion -->

    </div>
</div>


    
    <div class="col-md-4 col-d-flex-end">
        <div class="column-actions">
        
            <button id="js-verificar-siguiente" class="btn btn-primary js-verificar-siguiente" data-url="<?= Url::base() ?>">Finalizar</button>
            <span class="js-span-finalizado">Quiniela guardada (FECHA)</span>
        </div>
    </div>

</div>

<?php
if(count($partidos)==0){
    $this->registerJs(
        "
            $('.js-verificar-siguiente').remove();
        "
        
        ,View::POS_READY,
        'my-button-handler'
    );
}
    $this->registerJs(
        "$('.text-resultados').text('Los resultados serán publicados el ".Calendario::getDateComplete($fase->fch_premiacion)."')",
        View::POS_READY,
        'my-button-handler'
    );


if($terminoPartido){
?>

<?php

    $this->registerJs(
        "aparecerLabelTerminar('Finalizado el día ".Calendario::getDateCompleteHour($terminoPartido->fch_termino)."')",
        View::POS_READY,
        'my-button-handler'
    );
}