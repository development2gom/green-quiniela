<?php

use yii\bootstrap\Html;
use Faker\Guesser\Name;
use yii\helpers\ArrayHelper;
use app\models\Calendario;
use yii\bootstrap\ActiveForm;
use app\models\WrkPartidos;
$this->registerJsFile('@web/webAssets/js/site/nuevos-partidos.js',
['depends'=>[\app\assets\AppAsset::className()]]);

$this->title = "Nuevos Partidos";
$this->params['classBody'] = "sec-nuevos-partidos";
?>

<div class="sec-np-tabs-cont">
        
    <div class="nav-tabs-horizontal" data-plugin="tabs">
        <ul class="nav nav-tabs" role="tablist">
            <?php


            foreach ($fases as $faseTorneo) {
            

                ?>

               
                <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="tab" href="#<?=$faseTorneo->id_fase?>" aria-controls="<?=$faseTorneo->id_fase?>" role="tab" aria-expanded="false">
                    <?php # echo $faseTorneo->id_fase;?>
                    <?=$faseTorneo->txt_nombre_fase;?>
                </a>
            </li>

               <?php }
              
               ?>
            
           
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
           
                
        <?php 
        $validar = true;
       

        
               foreach ($fases as $faseTorneo) {
                $contador= 1;
               ?>
            
            

                 <?php
                  $nuevosPartidos2 = WrkPartidos::find()->where(['b_habilitado'=>1])
                  ->andWhere(["id_fase"=>$faseTorneo->id_fase])->all();

                  
                  ?>
                  <div class="tab-pane <?= $validar?'active':''?>" id="<?=$faseTorneo->id_fase?>" role="tabpanel" aria-expanded="false">
                 <?php
                 $validar = false;
                foreach ($nuevosPartidos2 as $partido) {


                    $form = ActiveForm::begin([
                    'id' => 'form-ajax-'.$partido->id_partido,
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => true,
                    'options' => [
                    'class' => 'form-pre-registro'
                    ]    
                    ]);
                    $contestado = false;

                    if($partido->id_equipo1){
                        $contestado = true;
                        
                    }
                   
                ?>
 

                <?= $form->field($partido,'id_partido')->hiddenInput(['value'=>$partido->id_partido])->label(false);?>
                    <div class="sec-np-item">
                    <?php # echo $faseTorneo->id_fase;?>
                        <div class="sec-np-item-text">
                            <h4>P<?=$contador?>:</h4>
                            <?php
                            $contador++;
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
                                <input name="inputCheckboxes" data-partido="<?=$id?>" class="js-submit" type="checkbox" <?=$contestado?'checked':''?>>
                                <label></label>
                            </div>
                        </div>

                    </div>

                <?php
                ActiveForm::end();

                }
                ?>
      </div>
                     
<?php
            }
                ?> 
            
            
        </div>
    </div>

</div>
