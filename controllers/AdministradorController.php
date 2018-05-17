<?php

namespace app\controllers;

use app\models\WrkPartidos;


class AdministradorController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionResultados()
    {
        return $this->render('resultados');
    }

    public function actionPartidos()
    {
        $partidos_nuevos =WrkPartidos::find()-> where(['b_habilitado'=>1])->
        andWhere(['is','id_equipo1',null])-> all();
        echo count($partidos_nuevos);
        return $this->render('partidos',['partidos_nuevos'=>$partidos_nuevos]);
    }

    public function actionActualizarPartidos(){
        return $this->render('actualizar-partido'); 
    }

}
