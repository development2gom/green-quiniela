<?php

use yii\bootstrap\Html;
use Faker\Guesser\Name;
use yii\helpers\ArrayHelper;
use app\models\Calendario;
use yii\bootstrap\ActiveForm;
$this->registerJsFile('@web/webAssets/js/site/nuevos-partidos.js',
['depends'=>[\app\assets\AppAsset::className()]]);

$this->title = "Nuevos Partidos";
$this->params['classBody'] = "sec-nuevos-partidos";
?>

<div class="sec-np-actions">
    <button class="btn btn-primary">GUARDAR</button>
</div>

<div class="sec-np-cont">
    
    <?php
    foreach ($nuevoPartido as $partido) {
        $form = ActiveForm::begin([
        'id' => 'form-ajax-'.$partido->id_partido,
        'enableAjaxValidation' => true,
        'enableClientValidation' => true,
        'options' => [
        'class' => 'form-pre-registro'
        ]    
        ]);
    ?>
    <?= $form->field($partido,'id_partido')->hiddenInput(['value'=>$partido->id_partido])->label(false);?>
        <div class="sec-np-item">
            
            <div class="sec-np-item-local">
                <p><?=  $form->field($partido,'id_equipo1')->dropDownList(ArrayHelper::map($equiposDisponibles,'id_equipo','txt_nombre_equipo'));?></p>
            </div>
            
            <div class="sec-np-item-empate">
                <?= Html::submitButton('guardar',['class'=>'js-submit','data-partido'=>$partido->id_partido]); ?>
                <?php
                $id=$partido->id_partido;
                $fecha =$partido->fch_partido;
                $fchPartido=Calendario::getDateComplete($fecha);
                echo $fchPartido;
                ?>
            </div>
            <div class="sec-np-item-visita">
                <p><?= $form->field($partido,'id_equipo2')->dropDownList(ArrayHelper::map($equiposDisponibles,'id_equipo','txt_nombre_equipo'),['id'=>'js']);?></p>
            </div>
        </div>
    <?php
    ActiveForm::end();
    }
    ?>
    

</div>
