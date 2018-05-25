
<?php

use yii\bootstrap\Button;
use app\models\Calendario;

            $nombreUsuario = null;

foreach($usuarios as $usuarioactual){

            $nombreUsuario = $usuarioactual->txt_username;
            $apellidoPaternoUsuario = $usuarioactual->txt_apellido_paterno;
            $apellidoMaternoUsuario = $usuarioactual->txt_apellido_materno;
            $puntos = $usuarioactual->num_puntos;
            $fechaCreacion = $usuarioactual->fch_creacion;
            $fecha = calendario::getDateComplete($fechaCreacion);


    if($nombreUsuario != null){

            echo $nombreUsuario.
            '<p>'.$apellidoPaternoUsuario.'<p>'.$apellidoMaternoUsuario.'<p>'.$puntos.'<p>'.$fecha.'<br><br>';
    
    }
}


?>


<p>
    <a href="http://localhost:81/clientes/green/green-quiniela/web/administrador/exportar" type="button" class="btn  btn-info">
         EXPORTAR
    </a>
</p>
