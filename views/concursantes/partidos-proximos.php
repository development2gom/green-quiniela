<?php

use app\models\Calendario;

$this->params['classBody'] = "site-navbar-small sec-concursante";

$this->registerJsFile('@web/webAssets/js/site/proximos-partidos.js',
['depends'=>[\app\assets\AppAsset::className()]]);

?>

<div class="row">
    <div class="col-md-4">
        algo
    </div>
    <div class="col-md-4">

        <h4>Fase de grupos</h4>

        <!-- Accordion -->
        <div class="panel-group panel-group-simple" id="siteMegaAccordion" aria-multiselectable="true" role="tablist">
            
            <?php
            foreach ($partidos as $partido) {
                $equipo1 = $partido->equipo1;
                $equipo2 = $partido->equipo2;
            ?>
            <div class="panel">
                <div class="panel-heading" id="siteMegaAccordionHeadingOne" role="tab">
                    <a class="panel-title" data-toggle="collapse" href="#siteMegaCollapseOne" data-parent="#siteMegaAccordion" aria-expanded="false" aria-controls="siteMegaCollapseOne">
                        Collapsible Group Item #1
                    </a>
                </div>
                <div class="panel-collapse collapse" id="siteMegaCollapseOne" aria-labelledby="siteMegaAccordionHeadingOne" role="tabpanel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <?= $equipo1->txt_nombre_equipo; ?>
                        
                            <img src='<?=$equipo1->txt_url_imagen_equipo;?>' data-partido ="<?=$partido->txt_token?>" 
                            data-nombre="<?=$equipo1->txt_nombre_equipo?>"
                            data-token="<?=$partido->id_equipo1?>"
                            class="js-equipo"/>
                        </div>
                        <div class="col-md-4">
                            <button class='js-equipo' data-nombre="empate" data-partido ="<?=$partido->txt_token?>">empate</button >
                        </div>
                        <div class="col-md-4">
                            <?= $equipo2->txt_nombre_equipo; ?>

                            <img src= '<?=$equipo2->txt_url_imagen_equipo;?>'  data-partido ="<?=$partido->txt_token?>" 
                            data-nombre="<?=$equipo2->txt_nombre_equipo?>"
                            data-token="<?=$partido->id_equipo2?>"
                            class="js-equipo">
                        </div>
                    </div>

                    <?php
                        # echo Calendario::getDateComplete( $partido->fch_partido);
                    ?>

                </div>
                </div>
            </div>
            <?php
            }
            ?>

        </div>
        <!-- End Accordion -->

        <?php
        /*
        foreach ($partidos as $partido) {
            $equipo1 = $partido->equipo1;
            $equipo2 = $partido->equipo2;
            echo $equipo1->txt_nombre_equipo;
            ?>
            <img src='<?=$equipo1->txt_url_imagen_equipo;?>' data-partido ="<?=$partido->txt_token?>" 
            data-nombre="<?=$equipo1->txt_nombre_equipo?>"
            data-token="<?=$partido->id_equipo1?>"
            class="js-equipo"/>
            <button class='js-equipo' data-nombre="empate" data-partido ="<?=$partido->txt_token?>">empate</button >
            <?php

            echo $equipo2->txt_nombre_equipo;
            ?>
            <img src= '<?=$equipo2->txt_url_imagen_equipo;?>'  data-partido ="<?=$partido->txt_token?>" 
            data-nombre="<?=$equipo2->txt_nombre_equipo?>"
            data-token="<?=$partido->id_equipo2?>"
            class="js-equipo">
            <?php
            echo Calendario::getDateComplete( $partido->fch_partido);
            echo '<br><br>';
        } */
        ?>

    </div>
    <div class="col-md-4">
        <a href="" class="btn btn-primary">Siguiente</a>
    </div>
</div>
        
