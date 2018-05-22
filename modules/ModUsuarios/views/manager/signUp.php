<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\EntUsuarios */

$this->title = 'Registro';
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
            <!-- <a class="avatar avatar-lg js-img-avatar">
                  <img class="js-image-preview" src="<?=Url::base()."/webAssets/images/site/user.png"?>">
                </a> -->
            <h2 class="brand-text"><?= Html::encode($this->title) ?></h2>
          </div>
          <?= $this->render('_form', [
            'model' => $model
          ]) ?>
          <!-- <p class="text-center">¿Tienes una cuenta? <a href="<?=Url::base()?>/login">Ingresa</a></p> -->
      </div>
    </div>
  </div>
</div>
