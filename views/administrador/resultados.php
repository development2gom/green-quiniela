<?php

$this->title = "Fases de Grupos";
$this->params['classBody'] = "sec-resultados-partidos";

use app\models\ViewPuntuacionUsuarios;
?>

<div class="sec-rp-cont">

    <?php
        foreach($fases as $fase){
        $ganadores = ViewPuntuacionUsuarios::find()->where(["id_fase"=>$fase->id_fase])->limit(13)->all();
    ?>
        <?=$fase->txt_nombre_fase?>
        <?php
        foreach($ganadores as $ganador){
        ?>
    
            <div>
                <h3><?=$ganador->txt_username?></h3>
        
                <p><?=$ganador->num_puntos?></p>
        
                <?=$ganador->txt_email?>
        
                <?=$ganador->fch_termino?>
            </div>
    
    <?php
        }
    }
    ?>
</div>