<?php
namespace app\models;

use Yii;

class Mensajes{
    
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