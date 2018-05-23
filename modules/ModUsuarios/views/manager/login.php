<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';
$this->params['classBody'] = "site-navbar-small sec-registro";

?>

<div class="row">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-body">
          <div class="brand text-center">

            <h2 class="brand-text"><?= Html::encode($this->title) ?></h2>

		  </div>


		  <?php 
			$form = ActiveForm::begin([
				'id' => 'form-ajax',
				'enableAjaxValidation' => true,
				'enableClientValidation' => true,
				'options' => [
					'class' => 'form-pre-registro'
				]				
			]);
			?>
			
			<?= $form->field($model, 'username', ["template"=>"<div class='row'><div class='col-md-4 d-flex align-self-center'>{label}</div><div class='col-md-8'>{input}{error}</div></div>"])->textInput(["class" => "form-control"]) ?>

			<?= $form->field($model, 'password', ["template"=>"<div class='row'><div class='col-md-4 d-flex align-self-center'>{label}</div><div class='col-md-8'>{input}{error}</div></div>"])->passwordInput(["class" => "form-control"]) ?>

			<div class="form-group clearfix olvide-contrasena">
				<a href="<?= Url::base() ?>/peticion-pass">¿Olvidaste tu contraseña?</a>
			</div>

			<div class="form-group">
				<?= Html::submitButton('<span class="ladda-label">Ingresar</span>', ["data-style" => "zoom-in", 'class' => 'btn btn-primary ladda-button', 'name' => 'login-button'])?>
			</div>

			<div class="form-group clearfix necesito-cuenta">
				<a href="<?= Url::base() ?>/sign-up">Necesito una cuenta</a>
			</div>

			<?php ActiveForm::end(); ?>

      </div>
    </div>
  </div>
</div>
