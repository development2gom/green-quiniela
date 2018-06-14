<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "view_puntuacion_usuarios".
 *
 * @property string $txt_username
 * @property string $txt_email
 * @property string $txt_telefono
 * @property int $id_usuario Registro identificador para el usuario
 * @property int $num_puntos
 * @property int $id_fase
 * @property string $fch_termino
 */
class ViewPuntuacionUsuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'view_puntuacion_usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_username', 'txt_email', 'txt_telefono', 'id_fase', 'fch_termino'], 'required'],
            [['id_usuario', 'num_puntos', 'id_fase'], 'integer'],
            [['fch_termino'], 'safe'],
            [['txt_username', 'txt_email'], 'string', 'max' => 255],
            [['txt_telefono'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'txt_username' => 'Txt Username',
            'txt_email' => 'Txt Email',
            'txt_telefono' => 'Txt Telefono',
            'id_usuario' => 'Id Usuario',
            'num_puntos' => 'Num Puntos',
            'id_fase' => 'Id Fase',
            'fch_termino' => 'Fch Termino',
        ];
    }
}
