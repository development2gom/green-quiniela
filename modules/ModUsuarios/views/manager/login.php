<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';
$this->params['classBody'] = "page-login-v3 layout-full login-page";

?>



<div class="panel">
	<div class="panel-body">
		<!-- <div class="brand">
			<img class="brand-img mb-40" src="<?= Url::base() ?>/webAssets/images/logo.png" alt="...">
		</div> -->


		<?php 
	$form = ActiveForm::begin([
		'id' => 'form-ajax',
		'enableAjaxValidation' => true,
		'enableClientValidation' => true,
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
	]);
	?>

		<?= $form->field($model, 'username')->textInput(["class" => "form-control"]) ?>

		<?= $form->field($model, 'password')->passwordInput(["class" => "form-control"]) ?>

		<div class="form-group clearfix olvide-contrasena">
			<a href="<?= Url::base() ?>/peticion-pass">¿Olvidaste tu contraseña?</a>
		</div>

		<?= Html::submitButton('<span class="ladda-label">Ingresar</span>', ["data-style" => "zoom-in", 'class' => 'btn btn-primary btn-block btn-lg mt-20 ladda-button', 'name' => 'login-button'])
	?>
		<div class="form-group clearfix necesito-cuenta">
			<a href="<?= Url::base() ?>/sign-up">Necesito una cuenta</a>
		</div>

		<?php ActiveForm::end(); ?>


		<p class="ayuda-soporte">
			<span>¿Necesitas ayuda? escribe a:</span>
			<a class="no-redirect" href="mailto:soporte@2gom.com.mx?Subject=Solicitud%de%Soporte">soporte@2gom.com.mx</a></p>
	</div>
</div>
