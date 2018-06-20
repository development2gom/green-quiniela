
<?php
use yii\helpers\Url;

$this->title = "Usuarios";
$this->params['classBody'] = "sec-usuarios";
['depends' => [\app\assets\AppAssetClassicTopBar::className()]];

use yii\bootstrap\Button;

use app\models\Calendario;
?>
<div class="sec-concursantes-cont">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th class="text-right">Fecha de registro</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                $nombreUsuario = null;
                foreach ($usuarios as $usuarioactual) {

                    $idUsuario = $usuarioactual->id_usuario;
                    $tipoUsuario = $usuarioactual->txt_auth_item;
                    $nombreUsuario = $usuarioactual->txt_username;
                    $apellidoPaternoUsuario = $usuarioactual->txt_apellido_paterno;
                    $apellidoMaternoUsuario = $usuarioactual->txt_apellido_materno;
                    $puntos = $usuarioactual->num_puntos;
                    $fechaCreacion = $usuarioactual->fch_creacion;

                    if ($nombreUsuario != null) {
                        ?>
                        <tr>

                            <td class="text-capitalize"><?= $nombreUsuario ?> <?= $apellidoPaternoUsuario ?> <?= $apellidoMaternoUsuario ?></td>
                            <td class="text-right"><?= $fechaCreacion ?></td>
                        </tr>
                    <?php

                }
            }
            ?>
            </tbody>
        </table>
    </div>


    <div class="sec-usuarios-actions">
        <a class="btn btn-primary" href="<?= Url::base() ?>/administrador/exportar" target="_blank">
            EXPORTAR
        </a>
    </div>

</div>