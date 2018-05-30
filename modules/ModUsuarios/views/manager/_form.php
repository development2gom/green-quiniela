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
            <div class="col-12 col-md-4">
                <label for="">Nombre</label>
            </div>
            <div class="col-12 col-md-8"> 
                <?= $form->field($model, 'txt_username')->textInput(['maxlength' => true])->label(false) ?>            
                <!--<input type="text" class="form-control">-->
            </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
            <div class="col-12 col-md-4">
                <label for="">Email</label>
            </div>
            <div class="col-12 col-md-8">
                <?= $form->field($model, 'txt_email')->textInput(['maxlength' => true])->label(false) ?>
                <!--<input type="email" class="form-control">-->
            </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
            <div class="col-12 col-md-4">
                <label for="">Confirmar email</label>
            </div>
            <div class="col-12 col-md-8">
                <?= $form->field($model, 'repeatEmail')->textInput(['maxlength' => true])->label(false) ?>
                <!--<input type="email" class="form-control">-->
            </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
            <div class="col-12 col-md-4">
                <label for="">Crea Contraseña</label>
            </div>
            <div class="col-12 col-md-8">
                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true])->label(false) ?>
                <!--<input type="email" class="form-control">-->
            </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
            <div class="col-12 col-md-4">
                <label for="">Confirmar contraseña</label>
            </div>
            <div class="col-12 col-md-8">
                <?= $form->field($model, 'repeatPassword')->passwordInput(['maxlength' => true])->label(false) ?>
                <!--<input type="email" class="form-control">-->
            </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
            <div class="col-12 col-md-4">
                <label for="">Teléfono Celular</label>
            </div>
            <div class="col-12 col-md-8">
                <?= $form->field($model, 'txt_telefono')->textInput(['maxlength' => true])->label(false) ?>            
                <!--<input type="tel" class="form-control">-->
            </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
            <div class="col-12 col-md-4">
                <label for="">Código postal</label>
            </div>
            <div class="col-12 col-md-8">
                <?= $form->field($model, 'txt_codigo_postal')->textInput(['maxlength' => true])->label(false) ?>            
                <!--<input type="tel" class="form-control">-->
            </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
            <div class="col-12 col-md-4">
                <label for="">Código de acceso</label>
            </div>
            <div class="col-12 col-md-8">
                <?= $form->field($model, 'txt_codigo')->textInput(['maxlength' => true, 'placeholder' => '7C564007X4W'])->label(false) ?>            
                <!--<input type="number" class="form-control">-->
            </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form-group-check">
                <!-- <div class="checkbox-custom checkbox-warning">
                    <input type="checkbox" id="check-terminos" name="inputCheckboxes" />
                    <label for="check-terminos">Acepto terminos y condiciones</label>
                    <span class="js-aviso-check"></span>
                </div>
                 -->
                <div class="checkboxes">
                    <div class="checkboxes-cont">
                        <input type="checkbox" id="check-terminos" name="inputCheckboxes" checked value="" />
                        <label for="check-terminos">
                            <span></span> <p>Acepto los términos y condiciones de la promoción.</p>
                        </label>
                    </div>
                </div>
                <div class="checkbox-mask"></div>

            </div>
        </div>
        
        <div class="form-group form-group-actions">
            <?= Html::submitButton($model->isNewRecord ? 'Registrarme' : 'Actualizar información', ['class' => "btn btn-primary btn-block btn-lg"]) ?>
        </div>

    <?php ActiveForm::end(); ?>