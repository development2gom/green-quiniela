<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_equipos".
 *
 * @property string $id_equipo
 * @property string $txt_nombre_equipo Nombre del equipo participante
 * @property string $txt_url_imagen_equipo Url del logotipo del equipo
 * @property int $num_goles Numero de goles anotados por el equipo
 * @property int $num_puntuacion Puntuacion del equipo
 * @property string $b_habilitado Dato implementado para habilitar el registro
 *
 * @property WrkPartidos[] $wrkPartidos
 * @property WrkPartidos[] $wrkPartidos0
 * @property WrkQuiniela[] $wrkQuinielas
 * @property WrkQuiniela[] $wrkQuinielas0
 */
class CatEquipos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_equipos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_nombre_equipo', 'txt_url_imagen_equipo'], 'required'],
            [['num_goles', 'num_puntuacion', 'b_habilitado'], 'integer'],
            [['txt_nombre_equipo'], 'string', 'max' => 50],
            [['txt_url_imagen_equipo'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_equipo' => 'Id Equipo',
            'txt_nombre_equipo' => 'Txt Nombre Equipo',
            'txt_url_imagen_equipo' => 'Txt Url Imagen Equipo',
            'num_goles' => 'Num Goles',
            'num_puntuacion' => 'Num Puntuacion',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWrkPartidos()
    {
        return $this->hasMany(WrkPartidos::className(), ['id_equipo1' => 'id_equipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWrkPartidos0()
    {
        return $this->hasMany(WrkPartidos::className(), ['id_equipo2' => 'id_equipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWrkQuinielas()
    {
        return $this->hasMany(WrkQuiniela::className(), ['id_equipo1' => 'id_equipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWrkQuinielas0()
    {
        return $this->hasMany(WrkQuiniela::className(), ['id_equipo2' => 'id_equipo']);
    }
}
