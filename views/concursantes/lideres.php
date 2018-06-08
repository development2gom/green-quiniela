<?php


?>
<?php
foreach($equipos as $equipo){
$lider = $equipo;

echo $lider->num_goles;
?>
<img src='<?=$lider->txt_url_imagen_equipo;?>'/>
<?php
echo $lider->txt_nombre_equipo;

echo '<br><br>';

}
?>
