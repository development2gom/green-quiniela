<?php
namespace app\models;

use Yii;
use app\config\ConfigSMS;

class Mensajes{

    public function labsMobile($mensaje, $numero){
        
        $mensaje = urlencode($mensaje);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.labsmobile.com/get/send.php?username=".ConfigSMS::USERNAME."&password=".ConfigSMS::PASS."&message=".$mensaje."&msisdn=".$numero,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            return false;
        } else {
            print_r( $response);
            return true;
        }
    }

    public function mandarMensageMasivos($mensaje, $numeroDestino){
        /**  ENVIO DE UN SOLO MENSAJE  **/
        curl_setopt_array($ch = curl_init(), array(
            CURLOPT_URL => "http://smsmasivos.com.mx/sms/api.envio.new.php",
            //HTTPS
            //CURLOPT_URL => "https://smsmasivos.com.mx/sms/api.envio.new.php",
            //CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_POSTFIELDS => array(
                    "apikey" => Yii::$app->params ['sms-api-key'],//API KEY DE CUENTA 
                    "mensaje" => $mensaje,
                    "numcelular" => $numeroDestino,
                    "numregion" => "52"
                )
        ));
        
        $respuesta=curl_exec($ch);
        $respuestaDecode=json_decode($respuesta);
        if($respuestaDecode->estatus == "ok"){
            curl_close($ch);
            return true;            
        }else{
            return false;
        }
        //echo $respuesta->mensaje;
    }
    
    public function mandarMensage($mensaje, $numeroDestino){
        /**  ENVIO DE UN SOLO MENSAJE  **/

        $parametros = '?username=PIXERED&password=Pakabululu01&message=' .urlencode($mensaje) . '&numbers=' . $numeroDestino;
        $urlAutenticate = 'http://sms-tecnomovil.com/SvtSendSms'.$parametros;
        //$sms = file_get_contents ( $url );
        #$urlAutenticate = 'http://dgom.mobi';
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $urlAutenticate );
        //curl_setopt ( $ch, CURLOPT_POSTREDIR, 3 );
        curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, true );
        // in real life you should use something like:
        // curl_setopt($ch, CURLOPT_POSTFIELDS,
        // http_build_query(array('postvar1' => 'value1')));
        // receive server response ...
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        $server_output = curl_exec ( $ch );
        curl_close ( $ch );
        return $server_output;
    }
}

?>