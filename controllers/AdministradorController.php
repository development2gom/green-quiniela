<?php

namespace app\controllers;
use app\models\ResponseServices;
use app\models\WrkPartidos;
use app\models\ModUsuariosEntUsuarios;


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
        
        return $this->render('partidos',['partidos_nuevos'=>$partidos_nuevos]);
    }

    public function actionActualizarPartidos(){
        //consultamos la base de datos para poder enviar los resultados a el ducumento destino
            $partidos =WrkPartidos::find()->where(['b_habilitado'=>1])->
            andWhere(['is not','id_equipo1',null])->
            andWhere(['is not','id_equipo2',null])
            ->all() ;
        
        //envio de datos a el documento destino
        return $this->render('actualizar-partidos',['partidos'=>$partidos]); 
        
    }

    public function actionGuardarActualizacion()
    {
            $response = new ResponseServices();
            $partido = null;
            $equipo_ganador = null;
        // verificams que las variables no se reciban vacias
        if(isset($_POST['partido']) ){

            $partido = $_POST['partido'];
             
         }
         if(isset($_POST['equipo_ganador'])){
             $equipo_ganador = $_POST['equipo_ganador'];
         }
       
         
         //generamos una consulta a la base de datos para obtener los registros correctos y asi poder reaizar la insercion de los mismos
            $ganador =WrkPartidos::find()->where(['b_habilitado'=>1])->
            andwhere(['txt_token'=>$partido])->one();

        //ingresamos a las propiedades de la variable
        //$consulta->id_partido=$resultado->id_partido;
        //$ganador->id_equipo_ganador;

        if($equipo_ganador){
            $ganador->id_equipo_ganador =$equipo_ganador;
            $ganador->b_empate=0;

        }
        else{
            $ganador->b_empate=1;
            $ganador->id_equipo_ganador =null;
        }
            //envia el contenido de quiniela a la base de datos
        if($ganador->save()){
           $response->status='success';
           $response->message='resgistro guardado'; 
        }

         return $response;
    
    }

    public function actionUsuarios(){
            $usuarios =ModUsuariosEntUsuarios::find()->all();
            return $this->render('usuarios',['usuarios'=>$usuarios]); 
    }


    public function actionExportar(){

    }

}
