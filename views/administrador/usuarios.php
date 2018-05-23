<?php

use yii\bootstrap\Button;
    $nombreUsuario = null;
foreach($usuarios as $usuarioactual){

            $idUsuario = $usuarioactual->id_usuario;
            $tipoUsuario = $usuarioactual->txt_auth_item;
            $nombreUsuario = $usuarioactual->txt_username;
            $apellidoPaternoUsuario = $usuarioactual->txt_apellido_paterno;
            $apellidoMaternoUsuario = $usuarioactual->txt_apellido_materno;
            $fechaCreacion = $usuarioactual->fch_creacion;


    if($nombreUsuario != null){
            echo $idUsuario.'<p>'.$tipoUsuario.'<p>'.$nombreUsuario.
            '<p>'.$apellidoPaternoUsuario.'<p>'.$apellidoMaternoUsuario.'<p>'.$fechaCreacion.'<br><br>';
    }
}


?>
