<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\WrkPartidos;
use yii\db\Expression;
use app\models\CatEquipos;
use app\models\CatFasesDelTorneo;
use yii\db\conditions\BetweenCondition;

use app\models\Mensajes;
use app\models\ResponseServices;
use app\models\WrkQuiniela;
use app\models\Calendario;
use app\models\RelUsuariosCodigos;
use app\components\AccessControlExtend;
use yii\filters\VerbFilter;
use app\modules\ModUsuarios\models\EntUsuarios;
use app\models\CatCodigos;

use app\models\EntUsuariosQuiniela;




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
                'only' => ['partidos-fase', 'partidos-proximos', 'verificar-codigo'],
                'rules' => [
                    [
                        'actions' => ['partidos-fase', 'partidos-proximos', 'verificar-codigo'],
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
        $usuario = EntUsuarios::getUsuarioLogueado();
        
        $this->layout = "classic/topBar/mainConcursante";
       
        $fase = CatFasesDelTorneo::find()->where(['b_habilitado' => 1])->andWhere(['between', new Expression('now()'), new Expression('fch_inicio'), new Expression('fch_termino')])
            ->one();

        if(!$fase){
            $proximaFase = CatFasesDelTorneo::find()->where(['b_habilitado' => 1])->andWhere(['<', new Expression('now()'), new Expression('fch_inicio')])
            ->one();

            if(!$proximaFase){
                $fases = CatFasesDelTorneo::find()->where(["b_habilitado"=>1])->all();
                return $this->render("quiniela-finalizada", ["fases"=>$fases]);
            }
            $fasesAnteriores = CatFasesDelTorneo::find()->where(['b_habilitado' => 1])->andWhere(['>', new Expression('now()'), new Expression('fch_termino')])
            ->all();

            
            return $this->render("fase-por-empezar", ["proximaFase"=>$proximaFase, "fasesAnteriores"=>$fasesAnteriores]);
        }   
        $partidos = WrkPartidos::find()->where(['b_habilitado' => 1])->andWhere(['is not', 'id_equipo1', null])->andWhere(['is not', 'id_equipo2', null])->andWhere(['id_fase' => $fase->id_fase])->orderBy(' txt_grupo ASC,fch_partido ASC,')->all();

        $terminoPartido = EntUsuariosQuiniela::find()->where(["id_usuario"=>$usuario->id_usuario, "id_fase"=>$fase->id_fase])->one();

        return $this->render('partidos-proximos', ['partidos' => $partidos, "terminoPartido"=>$terminoPartido]);
       

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
 
        $usuario = EntUsuarios::getUsuarioLogueado();
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
        
        //$idUsuario = 4;
        $usuario = EntUsuarios::getUsuarioLogueado();
        $idUsuario = $usuario->id_usuario;
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

    public function getFaseActual(){
        $faseTorneo = CatFasesDelTorneo::find()->where(['b_habilitado' => 1])
        ->andWhere(['between', new Expression('now()'), new Expression('fch_inicio'), new Expression('fch_termino')])
        ->one();

        return $faseTorneo;

    }
    public function actionFinalizado(){

        $usuario = EntUsuarios::getUsuarioLogueado();
        $faseTorneo = $this->getFaseActual();
        $codigo = RelUsuariosCodigos::find()->where(["id_fase"=>$faseTorneo->id_fase, "id_usuario"=>$usuario->id_usuario])->one();    

        if(!$codigo){
            // @todo usuario no esta participando
        }
        
        $existeQuiniela = EntUsuariosQuiniela::find()->where(["id_usuario"=>$usuario->id_usuario, "id_fase"=>$faseTorneo->id_fase])->one();

        if($existeQuiniela){
            $existeQuiniela->fch_termino = Calendario::getFechaActual();
        }else{
            $existeQuiniela = new EntUsuariosQuiniela();
            $existeQuiniela->id_usuario = $usuario->id_usuario;
            $existeQuiniela->id_fase = $faseTorneo->id_fase;
            $existeQuiniela->fch_termino = Calendario::getFechaActual();
        }

        if($existeQuiniela->save()){
            $mensajeTexto = "Gracias por participar. Finalizaste la quiniela el " . Calendario::getDateCompleteMessage($existeQuiniela->fch_termino);
            $mensajes = new Mensajes();
			$resp = $mensajes->mandarMensage($mensajeTexto, $usuario->txt_telefono);
            
            $this->layout = "classic/topBar/mainFinalizado";
            return $this->render("finalizado");
        }
    }

    public function actionGanadores(){
        $this->layout = "classic/topBar/mainBienvenido";
        return $this->render("ganadores");
    }

    public function actionVerificarCodigo(){
        $usuario = Yii::$app->user->identity;            

        if(isset($_POST['codigo'])){
            $codigo = CatCodigos::find()->where(['txt_codigo'=>$_POST['codigo'], 'b_habilitado'=>1])->one();
            
            /**
             * TODO: Verificar codigo por fase
             */
            if($codigo){
                if($codigo->b_codigo_usado == 0){
                    $codigo->b_codigo_usado = 1;
                    $codigo->save();

                    $relUSerCodigo = new RelUsuariosCodigos();
                    $relUSerCodigo->id_usuario = $usuario->id_usuario;
                    $relUSerCodigo->id_codigo = $codigo->id_codigo;
                    $relUSerCodigo->save();

                    return $this->redirect(['partidos-proximos']);
                }else{
                    $response = new ResponseServices();
                    $response->status = "error1";
                    $response->message = "Este codigo ya fue usado";

                    return $response;
                }
            }else{
                $response = new ResponseServices();
                $response->status = "error2";
                $response->message = "Este codigo no existe";

                return $response;
            }
        }
        $response = new ResponseServices();

         return $response;
    }
}

?>