
<?php

use yii\bootstrap\Button;

            $nombreUsuario = null;

foreach($usuarios as $usuarioactual){

            $idUsuario = $usuarioactual->id_usuario;
            $tipoUsuario = $usuarioactual->txt_auth_item;
            $nombreUsuario = $usuarioactual->txt_username;
            $apellidoPaternoUsuario = $usuarioactual->txt_apellido_paterno;
            $apellidoMaternoUsuario = $usuarioactual->txt_apellido_materno;
            $puntos = $usuarioactual->num_puntos;
            $fechaCreacion = $usuarioactual->fch_creacion;


    if($nombreUsuario != null){

            echo $idUsuario.'<p>'.$tipoUsuario.'<p>'.$nombreUsuario.
            '<p>'.$apellidoPaternoUsuario.'<p>'.$apellidoMaternoUsuario.'<p>'.$puntos.'<p>'.$fechaCreacion.'<br><br>';
    
    }
}


?>


<p>
    <a href="http://localhost:81/clientes/green/green-quiniela/web/administrador/exportar" type="button" class="btn  btn-info">
         EXPORTAR
    </a>
</p>
