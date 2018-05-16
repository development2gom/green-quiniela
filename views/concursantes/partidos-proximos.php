<?php

use app\models\Calendario;


?>

<?php
foreach ($partidos as $partido) {
    $equipo1 = $partido->equipo1;
    $equipo2 = $partido->equipo2;
    echo $equipo1->txt_nombre_equipo;
    ?>
    <img src='<?=$equipo1->txt_url_imagen_equipo;?>'/>
    <?php

    echo $equipo2->txt_nombre_equipo;
    ?>
    <img src= '<?=$equipo2->txt_url_imagen_equipo;?>'>
    <?php
    echo Calendario::getDateComplete( $partido->fch_partido);
    echo '<br><br>';
}

?>
