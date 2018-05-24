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
use app\components\AccessControlExtend;
use yii\filters\VerbFilter;



class ConcursantesController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControlExtend::className(),
                'only' => ['partidos-fase', 'partidos-proximos'],
                'rules' => [
                    [
                        'actions' => ['partidos-fase', 'partidos-proximos'],
                        'allow' => true,
                        'roles' => ['@'],   
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
   }

    public function actionInstrucciones()
    {
        return $this->render('instrucciones');
    }


    public function actionPartidosProximos()
    {
        $fase = CatFasesDelTorneo::find()->where(['b_habilitado' => 1])->andWhere(['between', new Expression('now()'), new Expression('fch_inicio'), new Expression('fch_termino')])
            ->one();

        $partidos = WrkPartidos::find()->where(['b_habilitado' => 1])->andWhere(['is not', 'id_equipo1', null])->andWhere(['is not', 'id_equipo2', null])->andWhere(['id_fase' => $fase->id_fase])->orderBy(' txt_grupo ASC,fch_partido ASC,')->all();

        $this->layout = "classic/topBar/mainConcursante";

        return $this->render('partidos-proximos', ['partidos' => $partidos]);

        return $this->render('partidos-proximos', ['partidos' => $partidos], ['fase' => $fase]);
       

    }

    public function actionResultados()
    {
        return $this->render('resultados');
    }

    public function actionLideres()
    {
        //consulta a la base de datos
        $equipos = CatEquipos::find()->where(['b_habilitado' => 1])->orderBy('num_puntuacion')->all();
        return $this->render('lideres', ['equipos' => $equipos]);
    }

    public function actionAdministrador()
    {
        return $this->render('index');
    }

    public function actionGuardarResultados()
    {
        $response = new ResponseServices();
        //crear un if para conpara la face  del catalogo de torneo y la fase de los partidos y son iguales poder segir con el gusrdado
        
        /**
        * TODO: Cambiar id_usuario a id de usuario logueado
        */
        $idUsuario = 4;
        $usuario = EntUsuarios::getUsuarioLogueado($idUsuario);
        $idUsuario = $usuario->id_usuario;

        $token = null;
        $partido_seleccionado = null;

        if (isset($_POST['token'])) {
            $token = $_POST['token'];

        } else {
            $response->message = 'falta parametro del partido';
            return $response;
        }
        //se reciben las variables por post y se verifica por mmedio del isset si esta no se encuentra vacia
        //posteriormente se aloja dentro de una variable
        if (isset($_POST['equipo_seleccionado'])) {
            $partido_seleccionado = $_POST['equipo_seleccionado'];
        }
        //camel keys
        
        //consulta a la base de datos
        $faseTorneo = CatFasesDelTorneo::find()->where(['b_habilitado' => 1])->andWhere(['between', new Expression('now()'), new Expression('fch_inicio'), new Expression('fch_termino')])
            ->one();

        $resultado = WrkPartidos::find()->where(['b_habilitado' => 1])->andWhere(['txt_token' => $token])->one();

        if ($faseTorneo->id_fase != $resultado->id_fase) {
            $response->message = "El tiempo de la fase ha expirado";

            return $response;
        }

        
        
//envia el contenido de quiniela a la base de datos


                $existeQuiniela = WrkQuiniela::find()->where(['id_usuario' => $idUsuario])->andWhere(['=', 'id_partido', new Expression('(select id_partido from wrk_partidos
                where b_habilitado = 1
                and txt_token ="' . $token . '")')])->one();


        if ($existeQuiniela) {
            
            
            if ($partido_seleccionado) {
                $existeQuiniela->id_equipo_ganador = $partido_seleccionado;
                $existeQuiniela->b_empata = 0;
            } else {
                $existeQuiniela->b_empata = 1;
                $existeQuiniela->id_equipo_ganador = null;
            }

            if ($existeQuiniela->save()) {
                $response->status = 'success';
                $response->message = 'resgistro guardado';
            }
        }else{

            //se le asigna a la variable quiniela todo el contenido que existe en la tabla wrkquiniela
            $quiniela = new WrkQuiniela();
                //por medio de las flechitas se busca llegar a el parametro necesitado para posteriormene alojarlo en labase de datos
            $quiniela->id_partido = $resultado->id_partido;
            $quiniela->id_usuario = $idUsuario;
            $quiniela->fch_creacion = Calendario::getFechaActual();

            
            if ($partido_seleccionado) {
                $quiniela->id_equipo_ganador = $partido_seleccionado;
            } else {
                $quiniela->b_empata = 1;
            }
            //envia el contenido de quiniela a la base de datos

            if ($quiniela->save()) {
                $response->status = 'success';
                $response->message = 'resgistro guardado';
            }
        }
        return $response;
    }


    public function actionTerminosCondiciones()
    {
        return $this->render('terminos-condiciones');

    }

    public function actionAvisoPrivacidad()
    {
        return $this->render('aviso-privacidad');

    }

    public function actionTermino()
    {

        $this->layout = "classic/topBar/mainTermino";
        return $this->render("termino");
    }

    public function actionFinalizado(){
        
        $this->layout = "classic/topBar/mainFinalizado";
        return $this->render("finalizado");
    

    }


}

?>