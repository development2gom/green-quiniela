<?php
use yii\helpers\Url;
use app\models\WrkPartidos;


$this->title = "Actualizar Partidos";
$this->params['classBody'] = "sec-actualizar-partidos";

$this->registerJsFile(
    '@web/webAssets/js/site/actualizar-partidos.js',
    ['depends' => [\app\assets\AppAsset::className()]]
);
?>



<div class="sec-np-tabs-cont">
    <div class="nav-tabs-horizontal" data-plugin="tabs">
        <ul class="nav nav-tabs" role="tablist">
        <?php
        foreach ($fases as $faseTorneo) {

            ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="tab" href="#p<?= $faseTorneo->id_fase ?>" aria-controls="p<?= $faseTorneo->id_fase ?>" role="tab" aria-expanded="false">
                    <?= $faseTorneo->txt_nombre_fase; ?>
                </a>
            </li>
        <?php 
    }
    ?>
        </ul>

       <div class="tab-content">
    




    <?php

    foreach ($fases as $faseTorneo) {


        $partidos = WrkPartidos::find()->where(['b_habilitado' => 1])->andWhere(['is not', 'id_equipo1', null])->andWhere(['is not', 'id_equipo2', null])->andWhere(['id_fase' => $faseTorneo->id_fase])
            ->all();
        ?>
<div class="tab-pane " id="p<?= $faseTorneo->id_fase ?>" role="tabpanel" aria-expanded="false">

<?php

                foreach ($partidos as $nuevosPartidos) {
                    $equipo1 = $nuevosPartidos->equipo1;
                    $equipo2 = $nuevosPartidos->equipo2;
                    // echo $equipo1;
                    // echo $equipo2;
                
                    // $equipo1 = $nuevosPartidos->equipo1;
                    //  $equipo2 = $nuevosPartidos->equipo2;

    ?>

<div id='js-seleccion-<?= $nuevosPartidos->txt_token ?>' class="sec-ap-item js-partido-<?= $nuevosPartidos->id_partido ?>">
            <div class="sec-ap-item-local <?= $nuevosPartidos->id_equipo1 == $nuevosPartidos->id_equipo_ganador ? 'active' : '' ?>">

                <img class="js-seleccionar-equipo js-equipos "
                 src='<?= $equipo1->txt_url_imagen_equipo; ?>'
                 data-nombre="<?= $equipo1->txt_nombre_equipo; ?>"  
                 data-token ="<?= $nuevosPartidos->txt_token ?>" 
                 data-equipo="<?= $nuevosPartidos->id_equipo1 ?>"/>
                <p><?= $equipo1->txt_nombre_equipo; ?></p>
            </div>
           
        </div>
        
        <div class="sec-ap-item-empate <?= $nuevosPartidos->b_empate == 1 ? 'active' : '' ?>">
                <button class='btn btn-secondary js-seleccionar-equipo js-equipos' 
                data-nombre='Empate' data-token ="<?= $nuevosPartidos->txt_token ?>" 
                data-equipo="<?= null ?>">empate</button >
            </div>
            
            <div class="sec-ap-item-visita <?= $nuevosPartidos->id_equipo2 == $nuevosPartidos->id_equipo_ganador ? 'active' : '' ?>">
                <img class="js-seleccionar-equipo js-equipos 
                <?= $nuevosPartidos->id_equipo2 == $nuevosPartidos->id_equipo_ganador ? 'active' : '' ?>"
                 src= '<?= $equipo2->txt_url_imagen_equipo; ?>' 
                 data-nombre='<?= $equipo2->txt_nombre_equipo ?>' 
                 data-token ="<?= $nuevosPartidos->txt_token ?>" 
                 data-equipo="<?= $nuevosPartidos->id_equipo2 ?>" >
                <p><?= $equipo2->txt_nombre_equipo; ?></p>
            </div>
            
<?php

}
?>

</div>

      



<?php

}
?>

        </div>
    </div>
</div>



    






    0