<?php

namespace app\controllers;

use app\models\ResponseServices;
use app\models\WrkPartidos;
use app\models\ModUsuariosEntUsuarios;
use app\models\CatEquipos;
use Symfony\Component\HttpFoundation\Response;
use app\models\WrkQuiniela;
use app\models\RelRespuestaUsuario;
use app\components\AccessControlExtend;
use app\models\CatFasesDelTorneo;
use yii\db\Expression;
use app\models\RelUsuariosCodigos;


class AdministradorController extends \yii\web\Controller
{

/**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControlExtend::className(),
                'only' => ['index','nuevos-partidos', 'resultados', 'partidos', 'actualizar-partidos', 'guardar-actualizacion'],
                'rules' => [
                    [
                        'actions' => ['index','nuevos-partidos', 'resultados', 'partidos', 'actualizar-partidos', 'guardar-actualizacion'],
                        'allow' => true,
                        'roles' => ['super-admin'],

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

        public function actionIndex()
        {
                return $this->redirect('resultados');
        }

        public function actionResultados()
        {
            $fases = CatFasesDelTorneo::find()->all();
                return $this->render('resultados', ["fases"=>$fases]);
        }

        public function actionPartidos()
        {
                $partidos_nuevos = WrkPartidos::find()->where(['b_habilitado' => 1])->andWhere(['is', 'id_equipo1', null])->all();

                return $this->render('partidos', ['partidos_nuevos' => $partidos_nuevos]);
        }

        public function actionActualizarPartidos()
        {
        //consultamos la base de datos para poder enviar los resultados a el ducumento destino
                $partidos = WrkPartidos::find()->
                where(['b_habilitado' => 1])->
                andWhere(['is not', 'id_equipo1', null])->andWhere(['is not', 'id_equipo2', null])
                        ->all();
                        $fases=CatFasesDelTorneo::find()->where(['b_habilitado'=>1])->all();
        
        //envio de datos a el documento destino
                $this->layout = "classic/topBar/mainAdmin";
                return $this->render('actualizar-partidos', ['partidos' => $partidos,'fases'=>$fases]);

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
        $ganador = WrkPartidos::find()->where(['b_habilitado'=>1])->
        andwhere(['txt_token'=>$partido])->one();

        if($equipo_ganador){
            if($ganador->id_equipo_ganador == $equipo_ganador){
                $response->status = 'success';
                $response->message = "Ya se habia guardado este resultado";

                return $response;
            }
        }else{
            if($ganador->b_empate == 1){
                $response->status = 'success';
                $response->message = "Ya se habia guardado este resultado";

                return $response;  
            }
        }

        //Guardar datos anteriores del resultado generado por el usuario
        $ganadorAnterior = $ganador->id_equipo_ganador;
        $empateAnterior = $ganador->b_empate;

        //Guardar datos del resultado real del partido
        if($equipo_ganador){
            $ganador->id_equipo_ganador = $equipo_ganador;
            $ganador->b_empate = 0;
        }else{
            $ganador->b_empate = 1;
            $ganador->id_equipo_ganador = null;
        }

        //envia el contenido de quiniela a la base de datos
        if($ganador->save()){
            $response->status='success';
            $response->message='resgistro guardado';

            //Buscar registros de resultados anteriores y si concuerdan con los resutados
            //reales restar un punto a los usuarios.
            $resultadosAnteriores = WrkQuiniela::find()->where(['id_partido'=>$ganador->id_partido])->all();
           
            
        }

        return $response;
    }

    public function actionUsuarios()
    {
        $usuarios = ModUsuariosEntUsuarios::find()->where(['txt_auth_item' => 'usuario-normal'])->all();
        return $this->render('usuarios', ['usuarios' => $usuarios]);


        $this->layout = "classic/topBar/mainAdmin";

        $usuarios = ModUsuariosEntUsuarios::find()->all();
        return $this->render('usuarios', ['usuarios' => $usuarios]);

        $this->layout = "classic/topBar/mainAdmin";
        $usuarios = ModUsuariosEntUsuarios::find()->where(['txt_auth_item' => 'usuario-normal'])->all();
        return $this->render('usuarios', ['usuarios' => $usuarios]);
    }

    public function actionExportar()
    {
        $fileName = "Usuarios.csv";
        header('Content-Type: application/excel');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');

        //$consultaUsuarios = ModUsuariosEntUsuarios::find()->where(['txt_auth_item' => 'usuario-normal'])->all();
        $consultaUsuarios = RelUsuariosCodigos::find()->all();


        $data[] = ["Nombre", "Teléfono","C.P.", "Email", "Puntuación", "Fecha Creacion", "Código usado"];

        foreach ($consultaUsuarios as $clienteUsuario) {
            $datosUsuario = $usuario->usuario;
            $datosCodigo = $usuario->codigo;

                $data[] = [
                        $datosUsuario->txt_username,
                        $datosUsuario->txt_telefono,
                        $datosUsuario->txt_codigo_postal,
                        $datosUsuario->txt_email,
                        $datosUsuario->num_puntos,
                        $datosUsuario->fch_creacion,
                        $datosCodigo->txt_codigo
                ];
        }

        $fp = fopen('php://output', 'w');
        fputs($fp, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));
        foreach ($data as $row) {

                fputcsv($fp, $row);
        }
        fclose($fp);
        exit;
    }

    public function actionNuevosPartidos()
    {
        
        $proximaFase = CatFasesDelTorneo::find()->where(['b_habilitado' => 1])->andWhere(['<', new Expression('now()'), new Expression('fch_termino')])->one();
        $fases=CatFasesDelTorneo::find()->where(['b_habilitado'=>1])->all();
       

        
        if(!$proximaFase){
         exit;
        }
        

        $nuevoPartido = WrkPartidos::find()->where(['id_equipo1' => null])->andWhere(['id_equipo2' => null])
        ->andWhere(["id_fase"=>$proximaFase])->all();

        $equiposDisponibles = CatEquipos::find()->where(['b_habilitado' => '1'])->orderBy('txt_nombre_equipo ASC')->all();
            //los valores ue se le envian al a vista en el return son los sigientes:
            // el primer valor denominado nuevos-partidos indica a la vista a la que se enviara
            // dentro de los corchetes se aloja entre comillas el nombre de la variable que se usara en la vista
            // la flecha que apunta a la variable indica lo que vale esa variable
        return $this->render('nuevos-partidos', ['nuevoPartido' => $nuevoPartido, 'equiposDisponibles' => $equiposDisponibles,'proximaFase'=>$proximaFase,'fases'=>$fases]);
    }

    public function actionGuardarPartidosNuevos()
    {
        $response = new ResponseServices();
        $WrkPartidos = null;
        $partido = null;
// print_r($_POST);
// exit();
        $newPartido = WrkPartidos::find()->where(['b_habilitado' => '1'])->andWhere(['id_partido' => $_POST['WrkPartidos']['id_partido']])->one();



        if (isset($_POST['WrkPartidos']['id_equipo1']) && isset($_POST['WrkPartidos']['id_equipo2'])) {
                $newPartido->id_equipo1 = $_POST['WrkPartidos']['id_equipo1'];
                $newPartido->id_equipo2 = $_POST['WrkPartidos']['id_equipo2'];


                if ($newPartido->save()) {
                        $response->status = 'success';
                        $response->message = 'resgistro guardado';
                }
        }
        return $response;
    }
}
