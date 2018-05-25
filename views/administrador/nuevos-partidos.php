<?php

use yii\bootstrap\Html;
use Faker\Guesser\Name;
use yii\helpers\ArrayHelper;
use app\models\Calendario;
use yii\bootstrap\ActiveForm;
$this->registerJsFile('@web/webAssets/js/site/nuevos-partidos.js',
['depends'=>[\app\assets\AppAsset::className()]]);

?>
<?php
foreach ($nuevoPartido as $partido)
    {
        $form = ActiveForm::begin([
            'id' => 'form-ajax-'.$partido->id_partido,
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'options' => [
             'class' => 'form-pre-registro'
            ]    
           ]);

           echo $form->field($partido,'id_partido')->hiddenInput(['value'=>$partido->id_partido])->label(false);

        echo $form->field($partido,'id_equipo1')->dropDownList(ArrayHelper::map($equiposDisponibles,'id_equipo','txt_nombre_equipo'));
        
        echo $form->field($partido,'id_equipo2')->dropDownList(ArrayHelper::map($equiposDisponibles,'id_equipo','txt_nombre_equipo'),['id'=>'js']);
        
        $id=$partido->id_partido;
        $fecha =$partido->fch_partido;
        $fchPartido=Calendario::getDateComplete($fecha);
        
       
     ?>   
      
        
<?php
        echo $fchPartido.'<br><br>';
        
        echo Html::submitButton('guardar',['class'=>'js-submit','data-partido'=>$partido->id_partido]);
 ?>

<?php

ActiveForm::end();
}


?>