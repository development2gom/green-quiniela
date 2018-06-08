<?php

use yii\bootstrap\Html;



?>

<?=Html::a('Iniciar',['partidos-proximos'],[ 
    'class'=>"btn btn-success"
])?>
<?php
    echo '<br><br>';
    ?>
<?=Html::a('lideres',['lideres'],['class'=>"btn-success"])?>