<?php

use app\models\ViewPuntuacionUsuarios;
use app\models\Calendario;

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
            $fechaActual = strtotime(Calendario::getFechaShort());
            $fechaPremiacion = strtotime(Calendario::getFechaShort($fase->fch_premiacion));

            if($fechaActual >= $fechaPremiacion){
                $ganadores = ViewPuntuacionUsuarios::find()->where(["id_fase"=>$fase->id_fase])->orderBy("num_puntos DESC, fch_termino ASC")->limit(13)->all();
                foreach ($ganadores as $index=>$ganador) {
                    ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <?=$ganador->txt_username?>
                                    </div>
                                    <div class="col-md-4">
                                        <?=$ganador->num_puntos?>
                                    </div>
                                    <div class="col-md-4">
                                        <?=Calendario::getDateCompleteHour($ganador->fch_termino)?>
                                    </div>
                                </div>
                                
        
                            </div>
                        </div>
                        
                    <?php
        
                    }
                    
            }else{
                ?>
                <h1>Los resultados de esta fase se publicaran el <?=Calendario::getDateComplete($fase->fch_premiacion)?></h1>
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