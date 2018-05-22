<?php


$this->registerJsFile('@web/webAssets/js/site/actualizar-partidos.js',
['depends'=>[\app\assets\AppAsset::className()]]);

?>
<?php
foreach ($partidos as $partidos) {
    $equipo1 = $partidos->equipo1;
    $equipo2 = $partidos->equipo2;
    echo $equipo1->txt_nombre_equipo;
    ?>
    <img src='<?=$equipo1->txt_url_imagen_equipo;?>' data-nombre="<?=$equipo1->txt_nombre_equipo;?>"  data-token ="<?=$partidos->txt_token?>" data-equipo="<?=$partidos->id_equipo1?>"
    class="js-equipos"/>
    <button class='js-equipos' data-nombre='Empate' data-token ="<?=$partidos->txt_token?>">empate</button >
    <?php

    echo $equipo2->txt_nombre_equipo;
    ?>
    <img src= '<?=$equipo2->txt_url_imagen_equipo;?>' data-nombre='<?=$equipo2->txt_nombre_equipo?>' data-token ="<?=$partidos->txt_token?>" data-equipo="<?=$partidos->id_equipo2?>"
    class="js-equipos">
    <?php
    
    echo '<br><br>';
}

?>