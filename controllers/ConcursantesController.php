<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\WrkPartidos;
use yii\db\Expression;
use app\models\CatEquipos;
use app\models\RelUsuariosCodigos;
use app\models\CatFasesDelTorneo;


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
        $partidos = WrkPartidos::find()->where(['b_habilitado'=>1])->andWhere(['>','fch_partido',new Expression('now()')])->all();
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

    public function actionPartidosFase(){
        $user = Yii::$app->user->Identity;
        $codigo = RelUsuariosCodigos::find()->where(['id_usuario'=>$user->id_usuario])->one();
        $fase = CatFasesDelTorneo::find()->where(['id_fase'=>$codigo->codigo->id_fase])->one();
        $partidos = WrkPartidos::find()->where(['id_fase'=>$fase->id_fase])->all();print_r($partidos);exit;
    }
}
?>