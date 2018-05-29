<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Cambiar Contraseña';
$this->params['classBody'] = "site-navbar-small sec-registro";

/* @var $this yii\web\View */
/* @var $model app\models\EntUsuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
  <div class="col-md-12">
    <div class="panel">

        <?php $form = ActiveForm::begin([
            'options' => [
                'class' => 'form-cambiar-pass'
            ]	
        ]); ?>
        

            <?= $form->field($model, 'password', ["template"=>"<div class='row'><div class='col-md-4 d-flex align-self-center'>{label}</div><div class='col-md-8'>{input}{error}</div></div>"])->passwordInput(["class" => "form-control"]) ?>
                
            <?= $form->field($model, 'repeatPassword', ["template"=>"<div class='row'><div class='col-md-4 d-flex align-self-center'>{label}</div><div class='col-md-8'>{input}{error}</div></div>"])->passwordInput(["class" => "form-control"]) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Cambiar Contraseña' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary btn-cambiar-password' : 'btn btn-primary btn-cambiar-password']) ?>
            </div>

        <?php ActiveForm::end(); ?>

    </div>
  </div>
</div>

