<?php

use yii\helpers\Url;

 if (!Yii::$app->user->isGuest){
?>
    <a href="<?=Url::base()?>/site/logout" class="quiniela-sign-up"><i class="icon fa-sign-out" aria-hidden="true"></i></a>
<?php
}
?>