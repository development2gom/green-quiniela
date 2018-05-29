<?php 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Recuperar contraseña';
$this->params['classBody'] = "page-login-v3 layout-full sec-registro";
?>
<div class="panel">
	<div class="panel-body">

		<div class="brand text-center">
			<h2 class="brand-text"><?= Html::encode($this->title) ?></h2>
		</div>


		<?php 
		$form = ActiveForm::begin([
			'id' => 'login-form',
			'options' => [
				'class' => 'form-peticion-pass'
			]	
		]); 
		?>

		<div class="form-group">
            <div class="row">
            <div class="col-12 col-md-4">
                <label for="">Nombre de usuario.</label>
            </div>
            <div class="col-12 col-md-8">
                <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label(false) ?>            
                <!--<input type="tel" class="form-control">-->
            </div>
            </div>
        </div>

		<div class="form-group clearfix">
			<a class="float-right" href="<?=Url::base()?>/sign-up">Necesito una cuenta</a>
		</div>

		<div class="form-group clearfix">
			<?= Html::submitButton('<span class="ladda-label">Recuperar contraseña</span>', ["data-style"=>"zoom-in", 'class' => 'btn btn-primary btn-peticion-pass btn-block btn-lg mt-20', 'name' => 'login-button'])?>
		</div>
		
        <div class="form-group clearfix  text-center mt-20">
			<a href="<?=Url::base()?>/login">Iniciar sesión</a>
		</div>
        


		<?php ActiveForm::end(); ?>


		<p class="soporteTxt">¿Necesitas ayuda? escribe a: <a class="no-redirect" href="mailto:soporte@2gom.com.mx?Subject=Solicitud%de%Soporte">soporte@2gom.com.mx</a></p>
	</div>
</div>
