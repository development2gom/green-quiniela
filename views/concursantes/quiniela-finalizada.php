<?php

use app\models\ViewPuntuacionUsuarios;
use app\models\Calendario;
use app\models\CatPremios;

$this->title = "Resultados";
$this->params['classBody'] = "site-navbar-small sec-concursante";

?>

<div class="row">
 
    <div class="col-md-6 offset-md-3">
        
        <h4>Resultados</h4>

        <?php
       
        foreach($fases as $key=>$fase){
            $premios = CatPremios::find()->where(["id_fase"=>$fase->id_fase])->orderBy("num_lugar")->all();
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
                $index = 0;
                $ganadores = ViewPuntuacionUsuarios::find()->where(["id_fase"=>$fase->id_fase])->orderBy("num_puntos DESC, fch_termino ASC")->limit(3)->all();
                foreach ($ganadores as $index=>$ganador) {
                    ?>
                        <div class="row">
                            <div class="col-10 col-md-4">
                                <p class="finalizada-nombre"><?=$ganador->txt_username?></p>
                            </div>
                            <div class="col-2 col-md-2">
                                <p class="finalizada-puntos"><?=$ganador->num_puntos?></p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="finalizada-fecha"><?=Calendario::getDateCompleteHour($ganador->fch_termino)?></p>
                            </div>

                            <div class="col-12 col-md-12">
                                <p class="finalizada-premios"><?=$premios[$index]->txt_nombre?></p>
                            </div>
                                
                        </div>
                        
                    <?php
                    $index++;
                    }
                    
            }else{
                ?>
                <h3 class="finalizada-resultado-fase">Los resultados de esta fase se publicaran el <?=Calendario::getDateComplete($fase->fch_premiacion)?></h3>
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

    <div class="col-md-6 offset-md-3">
        <p class="p-dudas-aclaraciones">Para dudas y aclaraciones comunícate al 01 800 467 1897.</p>
    </div>

</div>