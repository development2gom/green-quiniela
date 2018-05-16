<?php
namespace app\controllers;

use yii\web\Controller;
use app\models\WrkPartidos;
use yii\db\Expression;
use app\models\CatEquipos;


class ConcursantesController extends Controller{
 
    public function actionInstrucciones()
    {
        return $this->render('instrucciones');
    }

    public function actionPartidosProximos()
    {
        $partidos =WrkPartidos::find()->where(['b_habilitado'=>1])->
        andWhere(['>','fch_partido',new Expression('now()')])->all() ;
        return $this->render('partidos-proximos',['partidos'=>$partidos]);

    }
    public function actionResultados(){
        return $this->render('resultados');
    }
    public function actionLideres(){
        $equipos =CatEquipos::find()->where(['b_habilitado'=>1])->
        orderBy('num_puntuacion')->all();
        return $this->render('lideres',['equipos'=>$equipos]); 
    }
    Public Function actionAdministrador(){
        return $this->render('index');
    }

}


?>