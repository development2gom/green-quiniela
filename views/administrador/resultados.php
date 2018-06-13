<?php

use app\models\ViewPuntuacionUsuarios;
foreach($fases as $fase){
    $ganadores = ViewPuntuacionUsuarios::find()->where(["id_fase"=>$fase->id_fase])->limit(13)->all();
    ?>
    <?=$fase->txt_nombre_fase?>
    <?php
    foreach($ganadores as $ganador){
    ?>


        <?=$ganador->txt_username?>

        <?=$ganador->num_puntos?>

        <?=$ganador->txt_email?>

        <?=$ganador->fch_termino?>

<?php
    }
}
?>