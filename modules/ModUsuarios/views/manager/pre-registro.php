<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\EntUsuarios */

$this->title = 'Crea tu cuenta';
$this->params['classBody'] = "site-navbar-small sec-registro";

$this->registerCssFile(
  '@web/webAssets/css/signUp.css',
  ['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerJsFile(
  '@web/webAssets/js/sign-up.js',
  ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>

<div class="row">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-body">
          <div class="brand text-center">

            <h2 class="brand-text"><?= Html::encode($this->title) ?></h2>

          </div>
          <form class="form-pre-registro" action="">
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="">Nombre de usuario.</label>
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="">Contraseña.</label>
                </div>
                <div class="col-md-8">
                  <input type="password" class="form-control">
                </div>
              </div>
            </div>
            
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="">Confirmar tu contraseña.</label>
                </div>
                <div class="col-md-8">
                  <input type="password" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <a class="btn btn-primary" href="<?=Url::base()?>/sign-up">
                Continuar
              </a>
            </div>

          </form>

      </div>
    </div>
  </div>
</div>
