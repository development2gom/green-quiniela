<?php
$this->title = "Actualizar Partidos";
$this->params['classBody'] = "sec-actualizar-partidos";
$this->registerJsFile('@web/webAssets/js/site/actualizar-partidos.js',
['depends'=>[\app\assets\AppAsset::className()]]);

?>
<div class="sec-ap-actions">
    <button class="btn btn-primary js-guardar" >GUARDAR</button>
</div>

<div class="sec-ap-cont">
    
    <?php
    foreach ($partidos as $partidos) {
    $equipo1 = $partidos->equipo1;
    $equipo2 = $partidos->equipo2;
   
 
                        
                        
                        ?>


        <div class="sec-ap-item" id='js-seleccion-<?=$partidos->txt_token?>'>
            <div class="sec-ap-item-local " >
                <img src='<?=$equipo1->txt_url_imagen_equipo;?>' data-nombre="<?=$equipo1->txt_nombre_equipo;?>"  data-token ="<?=$partidos->txt_token?>" data-equipo="<?=$partidos->id_equipo1?>" class="js-equipos"/>
                <p><?=  $equipo1->txt_nombre_equipo;?></p>
            </div>
            
            <div class="sec-ap-item-empate " >
                <button class='btn btn-secondary js-equipos' data-nombre='Empate' data-token ="<?=$partidos->txt_token?>">empate</button >
            </div>
            <div class="sec-ap-item-visita " >
                <img src= '<?=$equipo2->txt_url_imagen_equipo;?>' data-nombre='<?=$equipo2->txt_nombre_equipo?>' data-token ="<?=$partidos->txt_token?>" data-equipo="<?=$partidos->id_equipo2?>" class="js-equipos">
                <p><?= $equipo2->txt_nombre_equipo;?></p>
            </div>
        </div>
    <?php
    }
    ?>
    

</div>