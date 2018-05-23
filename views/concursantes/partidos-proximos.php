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
    <div class="col-md-4 col-d-flex">
        <p class="text-completa-registra" data-url="<?= Url::base() ?>">
            Tienes del 1 al 12 de junio para completar y registrar tus predicciones de este fase.
        </p>
        <h5 class="text-resultados">Los resultados serán publicados el 29 de junio</h5>
    </div>
    <div class="col-md-4">

        <h4>Fase de grupos</h4>

        <!-- Accordion -->
        <div class="panel-group panel-group-simple" id="siteMegaAccordion" aria-multiselectable="true" role="tablist">
            
            <?php
            $grupoActual = null;
            foreach ($partidos as $key=> $partido) {
                /**
                 * TODO: Cambiar id_usuario a id de usuario logueado
                 */
                $resultado = WrkQuiniela::find()->where(["id_usuario"=>3, 'id_partido'=>$partido->id_partido])->one();

                $equipo1 = $partido->equipo1;
                $equipo2 = $partido->equipo2;
                if($grupoActual && $grupoActual!=$partido->txt_grupo){
                    echo '</div>
                    </div>';
                }        
                if($grupoActual!=$partido->txt_grupo){
                    $grupoActual = $partido->txt_grupo;
                ?>
                    <div class="panel-heading" id="siteMegaAccordionHeadingOne<?= $key ?>" role="tab">
                        <a class="panel-title" data-toggle="collapse" href="#siteMegaCollapseOne<?= $key ?>" data-parent="#siteMegaAccordion" aria-expanded="false" aria-controls="siteMegaCollapseOne">Grupo: <?= $grupoActual ?></a>
                    </div>
                    <div class="panel-collapse collapse" id="siteMegaCollapseOne<?= $key ?>" aria-labelledby="siteMegaAccordionHeadingOne<?= $key ?>" role="tabpanel">
                        <div class="panel-body">
                <?php
                }
                ?>
                <div id="js-div-partido-<?=$partido->txt_token?>" class="row <?= $resultado ? '' : 'js-partido-no-contestado' ?>">
                    <div class="col-md-4">
                        <p class="panel-body-pais"><?= $equipo1->txt_nombre_equipo; ?></p>
                    
                        <img src='<?=$equipo1->txt_url_imagen_equipo;?>' data-partido ="<?=$partido->txt_token?>" 
                        data-nombre="<?=$equipo1->txt_nombre_equipo?>"
                        data-token="<?=$partido->id_equipo1?>"
                        class="panel-body-equipo js-equipo"/>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <button class='btn btn-secondary panel-body-btn js-equipo' data-nombre="empate" data-partido ="<?=$partido->txt_token?>">empate</button >
                    </div>
                    <div class="col-md-4">
                        <p class="panel-body-pais"><?= $equipo2->txt_nombre_equipo; ?></p>

                        <img src= '<?=$equipo2->txt_url_imagen_equipo;?>'  data-partido ="<?=$partido->txt_token?>" 
                        data-nombre="<?=$equipo2->txt_nombre_equipo?>"
                        data-token="<?=$partido->id_equipo2?>"
                        class="panel-body-equipo js-equipo">
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
        <!-- End Accordion -->

    </div>
    </div>
    </div>
    
    <div class="col-md-4 col-d-flex-end">
    <button id="js-verificar-siguiente" class="btn btn-primary" data-url="<?=Url::base()?>">Siguiente</button>
    </div>

</div>
        
