<?php
namespace app\models;

use Yii;

class Calendario
{

    /**
	 * Obtenemos la fecha actual para guardarla en la base de datos
	 *
	 * @return string
	 */
	public static function getFechaActual() {
		date_default_timezone_set('America/Mexico_City');
		// Inicializamos la fecha y hora actual
		$fecha = date ( 'Y-m-d H:i:s', time () );
		return $fecha;
	}

    /**
     * Regresa el nombre del día
     * @param string $string
     * @return string
     */
    public static function getDayName($string = null)
    {
        date_default_timezone_set('America/Mexico_City');
        // Inicializamos la fecha y hora actual
        $tiempo = time();
        if ($string) {
            $tiempo = strtotime($string);
        }

        $fecha = date('N', $tiempo);


        $nombreDia = self::nombreDia($fecha);

        return $nombreDia;
    }

    /**
     * Regresa el número de la semana
     * @param string $string
     * @return string
     */
    public static function getNumberDayWeek($string = null)
    {
        date_default_timezone_set('America/Mexico_City');
        // Inicializamos la fecha y hora actual
        $tiempo = time();
        if ($string) {
            $tiempo = strtotime($string);
        }

        $fecha = date('w', $tiempo);

        return $fecha;
    }

    /**
     * Regresa el número del día
     * @param string $string
     * @return string
     */
    public static function getDayNumber($string = null)
    {
        date_default_timezone_set('America/Mexico_City');
        $tiempo = time();
        if ($string) {
            $tiempo = strtotime($string);
        }
        $diaNumero = date('d', $tiempo);

        return $diaNumero;
    }

    /**
     * Regresa el nombre del mes
     * @param string $string
     * @return string
     */
    public static function getMonthName($string = null)
    {
        date_default_timezone_set('America/Mexico_City');
        // Inicializamos la fecha y hora actual

        $tiempo = time();
        if ($string) {
            $tiempo = strtotime($string);
        }
        $fecha = date('n', $tiempo);
        $nombreMes = self::nombreMes($fecha);

        return $nombreMes;

    }

    /**
     * Regresa el número del mes
     * @param string $string
     * @return string
     */
    public static function getMonthNumber($string = null)
    {
        // Inicializamos la fecha y hora actual
        date_default_timezone_set('America/Mexico_City');
        $tiempo = time();
        if ($string) {
            $tiempo = strtotime($string);
        }
        $fecha = date('m', $tiempo);


        return $fecha;

    }

    /**
     * Regresa los 2 últimos números del año
     * @param string $string
     * @return string
     */
    public static function getYearLastDigit($string = null)
    {
        date_default_timezone_set('America/Mexico_City');
        $tiempo = time();
        if ($string) {
            $tiempo = strtotime($string);
        }
        $fecha = date('y', $tiempo);

        return $fecha;
    }

    /**
     * Regresa la fecha completa con hora
     * @param string $string
     * @return string
     */
    public static function getDateCompleteHour($string)
    {
        date_default_timezone_set('America/Mexico_City');
        $nombreDia = self::getDayName($string);
        $dia = self::getDayNumber($string);
        $mes = self::getMonthName($string);
        $anio = self::getYearLastDigit($string);
        $hora = self::getHoursMinutes($string);

        return $nombreDia . " " . $dia . "-" . $mes . "-" . $anio . " " . $hora;
    }

    /**
     * Regresa la fecha completa con hora
     * @param string $string
     * @return string
     */
    public static function getDateCompleteMessage($string)
    {
        date_default_timezone_set('America/Mexico_City');
        $nombreDia = self::getDayName($string);
        $dia = self::getDayNumber($string);
        $mes = self::getMonthName($string);
        $anio = self::getYearLastDigit($string);
        $hora = self::getHoursMessage($string);
        $min = self::getMinMessage($string);

        return $nombreDia . " " . $dia . " de " . $mes . " del " . $anio . " a las " . $hora . " horas con " . $min . " min";
    }

    /**
     * Regresa la fecha completa sin hora y minuto
     * @param string $string
     * @return string
     */
    public static function getDateComplete($string)
    {
        date_default_timezone_set('America/Mexico_City');
        $nombreDia = self::getDayName($string);
        $dia = self::getDayNumber($string);
        $mes = self::getMonthName($string);
        $anio = self::getYearLastDigit($string);
        $hora = self::getHoursMinutes($string);

        return $nombreDia . " " . $dia . "-" . $mes . "-" . $anio;
    }

    /**
     * Regresa la hora y minutos
     * @param string $string
     * @return string
     */
    public static function getHoursMinutes($string = null)
    {
        date_default_timezone_set('America/Mexico_City');
        $tiempo = time();
        if ($string) {
            $tiempo = strtotime($string);
        }
        $fecha = date('H:i', $tiempo);

        return $fecha;
    }

    /**
     * Regresa la hora y minutos
     * @param string $string
     * @return string
     */
    public static function getHoursMessage($string = null)
    {
        date_default_timezone_set('America/Mexico_City');
        $tiempo = time();
        if ($string) {
            $tiempo = strtotime($string);
        }
        $fecha = date('H', $tiempo);

        return $fecha;
    }
    
    /**
     * Regresa la hora y minutos
     * @param string $string
     * @return string
     */
    public static function getMinMessage($string = null)
    {
        date_default_timezone_set('America/Mexico_City');
        $tiempo = time();
        if ($string) {
            $tiempo = strtotime($string);
        }
        $fecha = date('i', $tiempo);

        return $fecha;
    }

    /**
     * Regresa el nombre mes dependiendo del número
     * @param string $fecha
     * @return string
     */
    public static function nombreMes($fecha)
    {
        $nombreMes = '';
        switch ($fecha) {
            case '1':
                $nombreMes = 'Ene';
                break;
            case '2':
                $nombreMes = 'Feb';
                break;
            case '3':
                $nombreMes = 'Mar';
                break;
            case '4':
                $nombreMes = 'Abr';
                break;
            case '5':
                $nombreMes = 'May';
                break;
            case '6':
                $nombreMes = 'Jun';
                break;
            case '7':
                $nombreMes = 'Jul';
                break;
            case '8':
                $nombreMes = 'Ago';
                break;
            case '9':
                $nombreMes = 'Sep';
                break;
            case '10':
                $nombreMes = 'Oct';
                break;
            case '11':
                $nombreMes = 'Nov';
                break;
            case '12':
                $nombreMes = 'Dic';
                break;
            default:
                # code...
                break;
        }

        return $nombreMes;
    }

    /**
     * Regresa el nombre del día
     * @param string $fecha
     * @return string
     */
    public static function nombreDia($fecha)
    {
        $dayName = '';
        switch ($fecha) {
            case '1':
                $dayName = 'Lunes';
                break;
            case '2':
                $dayName = 'Martes';
                break;
            case '3':
                $dayName = 'Miércoles';
                break;
            case '4':
                $dayName = 'Jueves';
                break;
            case '5':
                $dayName = 'Viernes';
                break;
            case '6':
                $dayName = 'Sábado';
                break;
            case '7':
                $dayName = 'Domingo';
                break;

        }

        return $dayName;
    }
}