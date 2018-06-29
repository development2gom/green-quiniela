<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "view_usuarios_data".
 *
 * @property string $txt_username
 * @property string $txt_telefono
 * @property string $txt_codigo_postal
 * @property string $txt_email
 * @property string $fch_creacion
 * @property string $txt_codigo Codigo de accseso a la quiniela
 * @property string $txt_nombre_fase
 * @property int $num_puntos
 */
class ViewUsuariosData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'view_usuarios_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_username', 'txt_telefono', 'txt_email', 'txt_codigo', 'txt_nombre_fase'], 'required'],
            [['fch_creacion'], 'safe'],
            [['num_puntos'], 'integer'],
            [['txt_username', 'txt_email'], 'string', 'max' => 255],
            [['txt_telefono'], 'string', 'max' => 10],
            [['txt_codigo_postal'], 'string', 'max' => 5],
            [['txt_codigo', 'txt_nombre_fase'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'txt_username' => 'Txt Username',
            'txt_telefono' => 'Txt Telefono',
            'txt_codigo_postal' => 'Txt Codigo Postal',
            'txt_email' => 'Txt Email',
            'fch_creacion' => 'Fch Creacion',
            'txt_codigo' => 'Txt Codigo',
            'txt_nombre_fase' => 'Txt Nombre Fase',
            'num_puntos' => 'Num Puntos',
        ];
    }
}
