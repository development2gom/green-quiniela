
<?php
$this->title = "Usuarios";
$this->params['classBody'] = "sec-usuarios";
['depends'=>[\app\assets\AppAssetClassicTopBar::className()]];

use yii\bootstrap\Button;
?>
<div class="sec-usuarios-cont">
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
                <div class="sec-usuarios-item">

                    <p class="sec-usuarios-nombre"><?= $nombreUsuario ?> <?= $apellidoPaternoUsuario ?> <?= $apellidoMaternoUsuario ?></p>
                    <p class="sec-usuarios-tipo"><?= $idUsuario ?> - <?= $tipoUsuario ?></p>
                    <p class="sec-usuarios-puntos"><?= $puntos ?></p>
                    <p class="sec-usuarios-fecha"><?= $fechaCreacion ?></p>

                </div>
            <?php
            }
        }
    ?>


    <div class="sec-usuarios-actions">
        <a href="http://localhost:81/clientes/green/green-quiniela/web/administrador/exportar" type="button" class="btn  btn-info">
            EXPORTAR
        </a>
    </div>

</div>