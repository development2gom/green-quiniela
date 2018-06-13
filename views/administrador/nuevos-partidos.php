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

<div class="sec-np-tabs-cont">
        
    <div class="nav-tabs-horizontal" data-plugin="tabs">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-toggle="tab" href="#tab-8vos" aria-controls="tab-8vos" role="tab" aria-expanded="false">
                    8vos de Final
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="tab" href="#tab-4tos" aria-controls="tab-4tos" role="tab" aria-expanded="false">
                    4tos de Final
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="tab" href="#tab-semi" aria-controls="tab-semi" role="tab" aria-expanded="false">
                    Semifinal
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="tab" href="#tab-final" aria-controls="tab-final" role="tab" aria-expanded="false">
                    Final
                </a>
            </li>

            <li class="dropdown nav-item" role="presentation" style="display: none;">
                <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" aria-expanded="false">Menu </a>
                <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" data-toggle="tab" href="#tab-8vos" aria-controls="tab-8vos" role="tab">8vos de Final</a>
                    <a class="dropdown-item" data-toggle="tab" href="#tab-4tos" aria-controls="tab-4tos" role="tab">4tos de Final</a>
                    <a class="dropdown-item" data-toggle="tab" href="#tab-semi" aria-controls="tab-semi" role="tab">Semifinal</a>
                    <a class="dropdown-item" data-toggle="tab" href="#tab-final" aria-controls="tab-final" role="tab">Final</a>
                </div>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab-8vos" role="tabpanel" aria-expanded="false">
                
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
                        
                        <div class="sec-np-item-text">
                            <h4>P1:</h4>
                            <?php
                            $id=$partido->id_partido;
                            $fecha =$partido->fch_partido;
                            $fchPartido=Calendario::getDateComplete($fecha);
                            ?>
                            <p><?= $fchPartido?></p>
                        </div>

                        <div class="sec-np-item-local">
                            <?=  $form->field($partido,'id_equipo1')->dropDownList(ArrayHelper::map($equiposDisponibles,'id_equipo','txt_nombre_equipo'))->label(false);?>
                        </div>
                        
                        <div class="sec-np-item-empate">
                            <?php # Html::submitButton('guardar',['class'=>'btn btn-secondary js-submit','data-partido'=>$partido->id_partido]); ?>
                            <p>VS</p>
                        </div>

                        <div class="sec-np-item-visita">
                            <?= $form->field($partido,'id_equipo2')->dropDownList(ArrayHelper::map($equiposDisponibles,'id_equipo','txt_nombre_equipo'),['id'=>'js'])->label(false);?>
                        </div>

                        <div class="sec-np-item-save">
                            <div class="checkbox-custom checkbox-primary checkbox-lg">
                                <input name="inputCheckboxes" type="checkbox">
                                <label></label>
                            </div>
                        </div>

                    </div>
                <?php
                ActiveForm::end();
                }
                ?>
            
            </div>
            <div class="tab-pane" id="tab-4tos" role="tabpanel" aria-expanded="false">
                Negant parvos fructu nostram mutans supplicii ac dissentias, maius tibi licebit
                ruinae philosophia. Salutatus repellere titillaret expetendum
                ipsi. Cupiditates intellegam exercitumque privatio concederetur,
                sempiternum, verbis malint dissensio nullas noctesque earumque.
            </div>
            <div class="tab-pane" id="tab-semi" role="tabpanel" aria-expanded="true">
                Benivole horrent tantalo fuisset adamare fugiendam tractatos indicaverunt animis
                chaere, brevi minuendas, ubi angoribus iisque deorsum audita
                haec dedocendi utilitas. Panaetium erimus platonem varias
                imperitos animum, iudiciorumque operis multa disputando.
            </div>
            <div class="tab-pane" id="tab-final" role="tabpanel" aria-expanded="false">
                Metus subtilius texit consilio fugiendam, opinionum levius amici inertissimae pecuniae
                tribus ordiamur, alienus artes solitudo, minime praesidia
                proficiscuntur reiciat detracta involuta veterum. Rutilius
                quis honestatis hominum, quisquis percussit sibi explicari.
            </div>
        </div>
    </div>

</div>
