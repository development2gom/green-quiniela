<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
$this->title = "Ingresar codigo";
$this->params['classBody'] = "site-navbar-small sec-concursante";
?>

<div class="row">
    <div class="col-md-4 col-d-flex">
        
    </div>   
    <div class="col-md-4">
        <h3>Ingresa tu código para participar</h3>
        <?php $form = ActiveForm::begin([
            'id' => 'form-ajax',
            'options' => ['class' => 'form-registro'],
           
           
        ]); ?>

         <div class="col-12 col-md-8">
                <?= $form->field($codigo, 'txt_codigo')->textInput(['maxlength' => true, 'placeholder' => '7C564007X4W'])->label(false) ?>            
                <!--<input type="number" class="form-control">-->
        </div>

        <div class="form-group form-group-actions">
            <?= Html::submitButton('Ingresar código', ['class' => "btn btn-primary btn-block btn-lg"]) ?>
        </div>


        <?php ActiveForm::end(); ?>
    </div>
</div>

