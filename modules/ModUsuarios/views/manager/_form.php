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
    
    <?= $form->field($model, 'txt_username')->textInput(['maxlength' => true, 'placeholder'=>'Nombre'])->label(false) ?>

    <?= $form->field($model, 'txt_apellido_paterno')->textInput(['maxlength' => true, 'placeholder'=>'Apellido paterno'])->label(false) ?>

    <?= $form->field($model, 'txt_email')->textInput(['maxlength' => true, 'placeholder'=>'Email'])->label(false) ?>
    <?= $form->field($model, 'repeatEmail')->textInput(['maxlength' => true, 'placeholder'=>'Repetir email'])->label(false) ?>
    
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'placeholder'=>'Contraseña'])->label(false) ?>
    
    <?= $form->field($model, 'repeatPassword')->passwordInput(['maxlength' => true, 'placeholder'=>'Repetir contraseña'])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registrarme' : 'Actualizar información', ['class' => "btn btn-success btn-block btn-lg"]) ?>
    </div>

    <div class="form-group form-group-check">
        <div class="checkbox-custom checkbox-primary">
            <input type="checkbox" id="check-terminos" name="inputCheckboxes" />
            <label for="check-terminos">Acepto terminos y condiciones</label>
        </div>
        <div class="checkbox-mask"></div>
    </div>

    <?php ActiveForm::end(); ?>