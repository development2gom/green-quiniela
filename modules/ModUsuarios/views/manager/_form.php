<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EntUsuarios */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin([
        'id' => 'form-ajax',
        'options' => ['class' => 'form-registro'],
        'enableAjaxValidation' => true,
        'enableClientValidation'=>true,
    ]); ?>

        <div class="form-group">
            <div class="row">
            <div class="col-md-4">
                <label for="">Nombre.</label>
            </div>
            <div class="col-md-8"> 
                <?= $form->field($model, 'txt_username')->textInput(['maxlength' => true])->label(false) ?>            
                <!--<input type="text" class="form-control">-->
            </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
            <div class="col-md-4">
                <label for="">Email.</label>
            </div>
            <div class="col-md-8">
                <?= $form->field($model, 'txt_email')->textInput(['maxlength' => true])->label(false) ?>
                <!--<input type="email" class="form-control">-->
            </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
            <div class="col-md-4">
                <label for="">Repetir email.</label>
            </div>
            <div class="col-md-8">
                <?= $form->field($model, 'repeatEmail')->textInput(['maxlength' => true])->label(false) ?>
                <!--<input type="email" class="form-control">-->
            </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
            <div class="col-md-4">
                <label for="">Contraseña.</label>
            </div>
            <div class="col-md-8">
                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true])->label(false) ?>
                <!--<input type="email" class="form-control">-->
            </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
            <div class="col-md-4">
                <label for="">Repetir contraseña.</label>
            </div>
            <div class="col-md-8">
                <?= $form->field($model, 'repeatPassword')->passwordInput(['maxlength' => true])->label(false) ?>
                <!--<input type="email" class="form-control">-->
            </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
            <div class="col-md-4">
                <label for="">Teléfono.</label>
            </div>
            <div class="col-md-8">
                <?= $form->field($model, 'txt_telefono')->textInput(['maxlength' => true])->label(false) ?>            
                <!--<input type="tel" class="form-control">-->
            </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
            <div class="col-md-4">
                <label for="">Codigo postal.</label>
            </div>
            <div class="col-md-8">
                <?= $form->field($model, 'txt_codigo_postal')->textInput(['maxlength' => true])->label(false) ?>            
                <!--<input type="tel" class="form-control">-->
            </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
            <div class="col-md-4">
                <label for="">Código.</label>
            </div>
            <div class="col-md-8">
                <?= $form->field($model, 'txt_codigo')->textInput(['maxlength' => true])->label(false) ?>            
                <!--<input type="number" class="form-control">-->
            </div>
            </div>
        </div>
    
        <?php # $form->field($model, 'txt_username')->textInput(['maxlength' => true]) ?>

        <?php # $form->field($model, 'txt_apellido_paterno')->textInput(['maxlength' => true]) ?>

        <?php # $form->field($model, 'txt_email')->textInput(['maxlength' => true]) ?>
        <?php # $form->field($model, 'repeatEmail')->textInput(['maxlength' => true]) ?>
        
        <?php # $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
        
        <?php # $form->field($model, 'repeatPassword')->passwordInput(['maxlength' => true]) ?>

        <div class="form-group form-group-check">
            <div class="checkbox-custom checkbox-primary">
                <input type="checkbox" id="check-terminos" name="inputCheckboxes" />
                <label for="check-terminos">Acepto terminos y condiciones</label>
                <span class="js-aviso-check"></span>
            </div>
            <div class="checkbox-mask"></div>
        </div>
        
        <div class="form-group form-group-actions">
            <?= Html::submitButton($model->isNewRecord ? 'Registrarme' : 'Actualizar información', ['class' => "btn btn-primary btn-block btn-lg"]) ?>
        </div>

    <?php ActiveForm::end(); ?>