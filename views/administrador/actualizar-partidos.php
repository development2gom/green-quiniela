<?php
use yii\helpers\Url;
use app\models\WrkPartidos;
use yii\db\Expression;


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
                <a class="nav-link" data-toggle="tab" 
                href="#p<?= $faseTorneo->id_fase ?>" 
                aria-controls="p<?= $faseTorneo->id_fase ?>" 
                role="tab" aria-expanded="false">
                    <?= $faseTorneo->txt_nombre_fase; ?>
                </a>
            </li>
        <?php 
    }
    ?>
            <li class="dropdown nav-item" role="presentation" style="display: list-item;">
                <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" aria-expanded="false">Fases </a>
                <div class="dropdown-menu" role="menu">

                <?php
                    foreach ($fases as $faseTorneo) {

                        ?>
                        <a class="nav-link" data-toggle="tab" 
                        href="#p<?= $faseTorneo->id_fase ?>" 
                        aria-controls="p<?= $faseTorneo->id_fase ?>" 
                        role="tab" aria-expanded="false">
                            <?= $faseTorneo->txt_nombre_fase; ?>
                        </a>
                    <?php 
                }
                ?>
                </div>
            </li>
        </ul>

       <div class="tab-content">
    




    <?php

    foreach ($fases as $faseTorneo) {


        $partidos = WrkPartidos::find()->
        where(['b_habilitado' => 1])->
        andWhere(['is not', 'id_equipo1', null])->
        andWhere(['is not', 'id_equipo2', null])->
        andWhere(['id_fase' => $faseTorneo->id_fase])->
        orderBy([ new Expression('fch_partido ASC')])->
        all();
        ?>
<div class="tab-pane active" id="p<?= $faseTorneo->id_fase ?>" role="tabpanel" aria-expanded="false">

<?php

                foreach ($partidos as $nuevosPartidos) {
                    $equipo1 = $nuevosPartidos->equipo1;
                    $equipo2 = $nuevosPartidos->equipo2;
                    

    ?>

<div id='js-seleccion-<?=$nuevosPartidos->txt_token ?>' class="sec-ap-item js-partido-<?= $nuevosPartidos->id_partido ?>">

            <div class="sec-ap-item-local js-seleccionar-equipo js-equipos 
            <?= $nuevosPartidos->id_equipo1 == $nuevosPartidos->id_equipo_ganador ? 'active' :''?>" 
            data-nombre="<?= $equipo1->txt_nombre_equipo; ?>" data-token ="<?= $nuevosPartidos->txt_token ?>" 
            data-equipo="<?= $nuevosPartidos->id_equipo1 ?>">
                <img src='<?= $equipo1->txt_url_imagen_equipo; ?>'/>
                <p><?= $equipo1->txt_nombre_equipo; ?></p>
            </div>
            
        
        
        <div class="sec-ap-item-empate ">
                <button class='btn btn-secondary js-seleccionar-equipo js-equipos <?= $nuevosPartidos->b_empate == 1 ? 'active' : '' ?>'  
                data-nombre='Empate' data-token ="<?= $nuevosPartidos->txt_token ?>" 
                data-equipo="<?= null ?>">empate</button >
            </div>


            <div class="sec-ap-item-visita js-seleccionar-equipo js-equipos
             <?= $nuevosPartidos->id_equipo2 == $nuevosPartidos->id_equipo_ganador ? 'active' : '' ?>" 
             data-nombre='<?= $equipo2->txt_nombre_equipo ?>' data-token ="<?= $nuevosPartidos->txt_token ?>" 
             data-equipo="<?= $nuevosPartidos->id_equipo2 ?>">

                <img src= '<?= $equipo2->txt_url_imagen_equipo; ?>' >

                <p><?= $equipo2->txt_nombre_equipo; ?></p>
            </div>

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
