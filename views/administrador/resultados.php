<?php

$this->title = "Ganadores";
$this->params['classBody'] = "sec-resultados-partidos";

use app\models\ViewPuntuacionUsuarios;
use app\models\CatPremios;
?>

<div class="sec-rp-cont">

    <div class="sec-rp-item">
        <?php
            
            foreach($fases as $fase){
                $ganadores = ViewPuntuacionUsuarios::find()->where(["id_fase"=>$fase->id_fase])->orderBy("num_puntos DESC, fch_termino ASC")->limit(3)->all();
        ?>
        <div class="sec-rp-content">
            <div class="sec-rp-head">
                <h3><?=$fase->txt_nombre_fase?></h3>
            </div>
            <?php
            $index = 0;
            $premios = CatPremios::find()->where(["id_fase"=>$fase->id_fase])->orderBy("num_lugar")->all();
            foreach($ganadores as $ganador){
            ?>
        
                <div class="sec-rp-body">

                    <div class="sec-rp-body-head">
                        <h4><?=$ganador->txt_username?></h4>
                        <p><?=$ganador->num_puntos?></p>
                    </div>

                    <p><span>Email:</span> <?=$ganador->txt_email?></p>            
                    <p><span>Fecha y hora de término:</span> <?=$ganador->fch_termino?></p>
                    <div class="col-12 col-md-12 p-0">
                        <p class="sec-rp-body-premios"><?=$premios[$index]->txt_nombre?></p>
                    </div>
                </div>
        
        <?php
            $index++;
            }
        ?>
        </div>
        <?php
            }
        ?>
    </div>
    

</div>