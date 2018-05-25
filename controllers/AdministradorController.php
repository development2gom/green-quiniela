<?php

namespace app\controllers;
use app\models\ResponseServices;
use app\models\WrkPartidos;
use app\models\ModUsuariosEntUsuarios;
use function React\Promise\all;
use app\models\CatEquipos;
use Symfony\Component\HttpFoundation\Response;


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
        $this->layout = "classic/topBar/mainAdmin";
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
        $this->layout = "classic/topBar/mainAdmin";
                $usuarios =ModUsuariosEntUsuarios::find()->
                where(['txt_auth_item'=>'usuario-normal'])->all();
                return $this->render('usuarios',['usuarios'=>$usuarios]); 

        
    }

    public function actionExportar(){


                $fileName = "Usuarios.csv";
                header('Content-Type: application/excel');
                header('Content-Disposition: attachment; filename="'.$fileName.'"');

                $consultaUsuarios=ModUsuariosEntUsuarios::find()->
                where(['txt_auth_item'=>'usuario-normal'])->all();

                $data[]= ["Nombre", "Apellido Paterno","Apellido Materno", "Email","Puntuacion", "Fecha Creacion"];

        foreach($consultaUsuarios as $clienteUsuario)
        {
                $data[]= [
                    $clienteUsuario->txt_username,
                    $clienteUsuario->txt_apellido_paterno,
                    $clienteUsuario->txt_apellido_materno,
                    $clienteUsuario->txt_email,
                    $clienteUsuario->num_puntos,
                    $clienteUsuario->fch_creacion
                ];
        }

                    $fp = fopen('php://output', 'w');
        foreach ( $data as $row ) 
        {
        
                    fputcsv($fp, $row);
        }
                    fclose($fp);

    }

    public function actionNuevosPartidos()
    {

                    $nuevoPartido =WrkPartidos::find()->
                    where(['id_equipo1'=>null])->
                    andWhere(['id_equipo2'=>null])->all();

                    $equiposDisponibles=CatEquipos::find()->
                    where(['b_habilitado'=>'1'])->
                    orderBy('txt_nombre_equipo ASC')->all();
                    //los valores ue se le envian al a vista en el return son los sigientes:
                    // el primer valor denominado nuevos-partidos indica a la vista a la que se enviara
                    // dentro de los corchetes se aloja entre comillas el nombre de la variable que se usara en la vista
                    // la flecha que apunta a la variable indica lo que vale esa variable
                    return $this->render('nuevos-partidos',['nuevoPartido'=>$nuevoPartido,'equiposDisponibles'=>$equiposDisponibles]);
    }
    public function actionGuardarPartidosNuevos()
    {


                $response = new ResponseServices();
                $WrkPartidos=null;
                $partido=null;
        
                $newPartido =WrkPartidos::find()->
                where(['b_habilitado'=>'1'])->
                andWhere(['id_partido'=>$_POST['WrkPartidos'] ['id_partido']])->one();

         

         if(isset( $_POST['WrkPartidos']['id_equipo1']) && isset( $_POST['WrkPartidos']['id_equipo2']))
         {
                $newPartido->id_equipo1=  $_POST['WrkPartidos']['id_equipo1'];
                $newPartido->id_equipo2=  $_POST['WrkPartidos']['id_equipo2'];

        
        if($newPartido->save())
        {
                $response->status='success';
                $response->message='resgistro guardado'; 
        }
        }
                return $response;
            
        
    }

}
