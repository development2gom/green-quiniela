<?php
use yii\helpers\Url;
use app\models\Calendario;
use app\models\WrkQuiniela;
use yii\web\View;

$this->title = "Quiniela mundialista";
$this->params['classBody'] = "site-navbar-small sec-concursante";


?>
<style>
    .row{
        clear: both;
        padding: 20px;
    }
    .col-4.col-md-4{float:left;}
    .panel-body-item.active, .panel-body-item-button.active{
        border: 1px solid black;
        padding: 20px;
    }
</style>
<div class="row">
    <div class="col-md-4 col-d-flex">
        <div class="column-textos">
            <p class="text-completa-registra" data-url="<?= Url::base() ?>">
            Quiniela mundialista       
        </p>
        </div>
    </div>
    <div class="col-md-4">

        <h4>Fase de grupos</h4>

        <!-- Accordion -->
        <div class="panel-group panel-group-simple" id="siteMegaAccordion">
            
            <?php
            $grupoActual = null;
            foreach ($partidos as $key => $partido) {

                $user = Yii::$app->user->identity;
                $resultado = WrkQuiniela::find()->where(["id_usuario" => $user->id_usuario, 'id_partido' => $partido->id_partido])->one();

                $equipo1 = $partido->equipo1;
                $equipo2 = $partido->equipo2;//print_r($resultado);exit;//echo "<br/>";print_r($equipo1);exit;
                if ($grupoActual && $grupoActual != $partido->txt_grupo) {
                    echo '</div>
                    </div>';
                }
                if ($grupoActual != $partido->txt_grupo) {
                    $grupoActual = $partido->txt_grupo;
                    ?>
                    <div class="panel-heading" >
                        <a class="panel-title"  >
                            Grupo: <?= $grupoActual ?>
                        </a>

                    </div>
                    <div class="panel-collapse" id="siteMegaCollapseOne<?= $key ?>" >
                        <div class="panel-body">
                <?php

            }
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
        <!-- End Accordion -->

    </div>
    </div>
    </div>
    
    <div class="col-md-4 col-d-flex-end">
        <div class="column-actions">
            <button id="js-verificar-siguiente" class="btn btn-primary js-verificar-siguiente" data-url="<?= Url::base() ?>">Finalizar</button>
            <span class="js-span-finalizado">Quiniela guardada (FECHA)</span>
        </div>
    </div>

</div>
