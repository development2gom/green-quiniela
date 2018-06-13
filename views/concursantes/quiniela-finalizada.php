<?php

use app\models\ViewPuntuacionUsuarios;

$this->title = "Resultados";
$this->params['classBody'] = "site-navbar-small sec-concursante";
?>

<div class="row">
    <div class="col-md-4 col-d-flex">
        
    </div>   
    <div class="col-md-4">
        
        <h4>Resultados</h4>

        <?php
        foreach($fases as $key=>$fase){
            $ganadores = ViewPuntuacionUsuarios::find()->where(["id_fase"=>$fase->id_fase])->limit(13)->all();
        ?>
        <!-- Accordion -->
        <div class="panel-group panel-group-simple" id="siteMegaAccordion" aria-multiselectable="true" role="tablist">
            <div class="panel-heading" id="siteMegaAccordionHeadingOne<?= $key ?>" role="tab">
                        <a class="panel-title" data-toggle="collapse" href="#siteMegaCollapseOne<?= $key ?>" data-parent="#siteMegaAccordion" aria-expanded="false" aria-controls="siteMegaCollapseOne<?= $key ?>">
                            Fase: <?= $fase->txt_nombre_fase ?>
                        </a>

            </div>
            <div class="panel-collapse collapse" id="siteMegaCollapseOne<?= $key ?>" aria-labelledby="siteMegaAccordionHeadingOne<?= $key ?>" role="tabpanel">
                <div class="panel-body">
                <?php
            
            foreach ($ganadores as $ganador) {
            ?>
                <div class="row">
                    <div class="col-md-12">
                        <?=$ganador->txt_username?>
                        <?=$ganador->num_puntos?>
                        <?=$ganador->txt_email?>
                        <?=$ganador->fch_termino?>

                    </div>
                </div>
                
            <?php

            }
            ?>
                </div>
            </div>    
            

        </div>
        <!-- End Accordion -->
        <?php
        }
        ?>
    </div>
</div>