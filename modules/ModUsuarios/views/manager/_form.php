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
        'fieldConfig' => [
            "template" => "{input}{label}{error}",
            "options" => [
                "class" => "form-group form-material floating",
                "data-plugin" => "formMaterial"
            ],
            "labelOptions" => [
                "class" => "floating-label"
            ]
        ]
    ]); ?>
    
    <?= $form->field($model, 'txt_username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_apellido_paterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'repeatEmail')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'repeatPassword')->passwordInput(['maxlength' => true]) ?>

    <div class="form-group form-group-actions">
        <?= Html::submitButton($model->isNewRecord ? 'Registrarme' : 'Actualizar información', ['class' => "btn btn-primary btn-block btn-lg"]) ?>
    </div>

    <div class="form-group form-group-check">
        <div class="checkbox-custom checkbox-primary">
            <input type="checkbox" id="check-terminos" name="inputCheckboxes" />
            <label for="check-terminos">Acepto terminos y condiciones</label>
        </div>
        <div class="checkbox-mask"></div>
    </div>

    <?php ActiveForm::end(); ?>