<?php 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Recuperar contraseña';
$this->params['classBody'] = "page-login-v3 layout-full sec-registro";
?>
<?php if (Yii::$app->session->hasFlash('success')):?>
<div class="alert dark alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">×</span>
	</button>
	<?php echo Yii::$app->session->getFlash('success'); ?>
</div>

<?php endif;?>
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
				<div class="col-md-12">
					<h3>Recibirás un email para actualizar tu contraseña</h3>
				</div>
			</div>
            <div class="row">
            <div class="col-12 col-md-4">
                <label for="">Email registrado</label>
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


		
	</div>
</div>
