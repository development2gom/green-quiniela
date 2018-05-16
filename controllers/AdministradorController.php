<?php

namespace app\controllers;

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
        return $this->render('partidos');
    }

    public function actionActualizarPartidos(){
        return $this->render('actualizar-partido'); 
    }

}
