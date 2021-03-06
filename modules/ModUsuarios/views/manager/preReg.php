<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\EntUsuarios */

$this->title = 'Registrarse';
$this->params['classBody'] = "page-login-v3 layout-full login-page";

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
  <div class="col-md-4 col-md-offset-4">
    <div class="panel">
      <div class="panel-body">
          <div class="brand text-center">
            <!-- <a class="avatar avatar-lg js-img-avatar">
                  <img class="js-image-preview" src="<?=Url::base()."/webAssets/images/site/user.png"?>">
                </a> -->
            <h2 class="brand-text font-size-18 text-center"><?= Html::encode($this->title) ?></h2>
          </div>
          
          <form id="js-pre-registro">
            <input type="text" name="user" placeholder="usuario">
            <input type="password" name="pass" placeholder="password">
            <input type="password" name="pass2" placeholder="repetir password">
            <button type="submit">Guardar</button>
          </form>

          <p class="text-center">¿Tienes una cuenta? <a href="<?=Url::base()?>/login">Ingresa</a></p>
      </div>
    </div>
  </div>
</div>
