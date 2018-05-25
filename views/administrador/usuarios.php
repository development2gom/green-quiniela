
<?php
$this->title = "Usuarios";
$this->params['classBody'] = "sec-usuarios";
['depends'=>[\app\assets\AppAssetClassicTopBar::className()]];

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
<div class="sec-usuarios-cont">

    <table class="table table-hover table-responsive">
        <thead>
            <tr>
                <th>Nombre</th>
                <th class="text-center">Número de puntos</th>
                <th>Fecha de creación</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
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
                ?>
                    <tr>

                        <td><?= $nombreUsuario ?> <?= $apellidoPaternoUsuario ?> <?= $apellidoMaternoUsuario ?></td>
                        <td class="text-center"><?= $puntos ?></td>
                        <td><?= $fechaCreacion ?></td>
                    </tr>
                <?php
                }
            }
            ?>
        </tbody>
    </table>


    <div class="sec-usuarios-actions">
        <a href="http://localhost:81/clientes/green/green-quiniela/web/administrador/exportar" type="button" class="btn  btn-info">
            EXPORTAR
        </a>
    </div>

</div>