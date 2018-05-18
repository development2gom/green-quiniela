<?php

use app\models\Calendario;

$this->registerJsFile('@web/webAssets/js/site/proximos-partidos.js',
['depends'=>[\app\assets\AppAsset::className()]]);

?>

<?php
foreach ($partidos as $partido) {
    $equipo1 = $partido->equipo1;
    $equipo2 = $partido->equipo2;
    echo $equipo1->txt_nombre_equipo;
    ?>
    <img src='<?=$equipo1->txt_url_imagen_equipo;?>' data-partido ="<?=$partido->txt_token?>" data-token="<?=$partido->id_equipo1?>"
    class="js-equipo"/>
    <button class='js-equipo'data-partido ="<?=$partido->txt_token?>">empate</button >
    <?php

    echo $equipo2->txt_nombre_equipo;
    ?>
    <img src= '<?=$equipo2->txt_url_imagen_equipo;?>'data-partido ="<?=$partido->txt_token?>" data-token="<?=$partido->id_equipo2?>"
    class="js-equipo">
    <?php
    echo Calendario::getDateComplete( $partido->fch_partido);
    echo '<br><br>';
}

?>
