<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\WrkPartidos;
use yii\db\Expression;
use app\models\CatEquipos;
use app\models\CatFasesDelTorneo;
use yii\db\conditions\BetweenCondition;


use app\models\ResponseServices;
use app\models\WrkQuiniela;
use app\models\Calendario;
use app\models\RelUsuariosCodigos;



class ConcursantesController extends Controller{
 
    /**
     * @inheritdoc
     */
    /*public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControlExtend::className(),
                'only' => ['partidos-fase'],
                'rules' => [
                    [
                        'actions' => ['partidos-fase'],
                       'allow' => true,
                        'roles' => ['usuario-normal'],

                        
                    ],
                    
                ],
            ],
           // 'verbs' => [
           //     'class' => VerbFilter::className(),
           //     'actions' => [
           //         'logout' => ['post'],
           //     ],
           // ],
       ];
   }*/

    public function actionInstrucciones()
    {
        return $this->render('instrucciones');
    }


    public function actionPartidosProximos()
    {
        $fase =CatFasesDelTorneo::find()->where(['b_habilitado'=>1])->
        andWhere(['between',new Expression('now()'),new Expression('fch_inicio'),new Expression('fch_termino')])
        ->one();

        $partidos =WrkPartidos::find()->where(['b_habilitado'=>1])->
        andWhere(['is not','id_equipo1',null])->
        andWhere(['is not','id_equipo2',null])->
        andWhere(['id_fase'=>$fase->id_fase ])->
        orderBy(' txt_grupo ASC,fch_partido ASC,')->
        //andWhere([new Expression('order by',' fch_partido','desc','txt_grupo','desc')]->
        
        //andWhere(['<','fch_partido',
        //new Expression('now()')])->

      // andWhere(['txt_grupo'=>'A'])->  
       all() ;

        return $this->render('partidos-proximos',['partidos'=>$partidos]);

    }
    public function actionResultados(){
        return $this->render('resultados');
    }
    public function actionLideres(){
        //consulta a la base de datos
        $equipos =CatEquipos::find()->where(['b_habilitado'=>1])->
        orderBy('num_puntuacion')->all();
        return $this->render('lideres',['equipos'=>$equipos]); 
    }
    Public Function actionAdministrador(){
        return $this->render('index');
    }

    public function actionGuardarResultados(){
    $idUsuario=3;
     // Yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
        $response = new ResponseServices();

        $token = null;
        $partido_seleccionado = null;

        if(isset($_POST['token']) ){

            $token = $_POST['token'];
            
        }

        else{
            $response->message='falta parametro del partido';
            return $response;
        }
//se reciben las variables por post y se verifica por mmedio del isset si esta no se encuentra vacia
//posteriormente se aloja dentro de una variable
        if(isset($_POST['equipo_seleccionado'])){
            $partido_seleccionado = $_POST['equipo_seleccionado'];

        }
//camel keys
        $existeQuiniela =WrkQuiniela::find()->
        where(['id_usuario'=>$idUsuario])->
        andWhere(['=','id_partido',new Expression('(select id_partido from wrk_partidos
        where b_habilitado = 1
        and txt_token ="'.$token.'")')])->one();
        if($existeQuiniela){

            $response->message="El resgistro ya se encuentra guardado";

            return $response;

        }
        
//consulta a la base de datos
        $resultado =WrkPartidos::find()->where(['b_habilitado'=>1])->
        andWhere(['txt_token'=>$token])->one();
//se le asigna a la variable quiniela todo el contenido que existe en la tabla wrkquiniela
        $quiniela = new WrkQuiniela();
        //por medio de las flechitas se busca llegar a el parametro necesitado para posteriormene alojarlo en labase de datos
        $quiniela->id_partido=$resultado->id_partido;
        $quiniela->id_usuario=$idUsuario;
        $quiniela->fch_creacion=Calendario::getFechaActual();
                
        if($partido_seleccionado){
            $quiniela->id_equipo_ganador =$partido_seleccionado;

        }
        else{
            $quiniela->b_empata=1;
        }
//envia el contenido de quiniela a la base de datos
        if($quiniela->save()){
           $response->status='success';
           $response->message='resgistro guardado'; 
        }



       
            return $response;
    }

    public function actionTerminosCondiciones(){
        return $this->render('terminos-condiciones');

    }

    public function actionAvisoPrivacidad(){
        return $this->render('aviso-privacidad');

    }

}

?>