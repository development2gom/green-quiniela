<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rel_respuesta_usuario".
 *
 * @property string $id_usuario
 * @property string $id_partido
 * @property string $id_ganador
 * @property string $b_empate
 * @property string $b_error
 *
 * @property CatEquipos $ganador
 * @property ModUsuariosEntUsuarios $usuario
 * @property WrkPartidos $partido
 */
class RelRespuestaUsuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rel_respuesta_usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_partido', 'b_empate'], 'required'],
            [['id_usuario', 'id_partido', 'id_ganador', 'b_empate', 'b_error'], 'integer'],
            [['id_usuario', 'id_partido'], 'unique', 'targetAttribute' => ['id_usuario', 'id_partido']],
            [['id_ganador'], 'exist', 'skipOnError' => true, 'targetClass' => CatEquipos::className(), 'targetAttribute' => ['id_ganador' => 'id_equipo']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => ModUsuariosEntUsuarios::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
            [['id_partido'], 'exist', 'skipOnError' => true, 'targetClass' => WrkPartidos::className(), 'targetAttribute' => ['id_partido' => 'id_partido']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'id_partido' => 'Id Partido',
            'id_ganador' => 'Id Ganador',
            'b_empate' => 'B Empate',
            'b_error' => 'B Error',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGanador()
    {
        return $this->hasOne(CatEquipos::className(), ['id_equipo' => 'id_ganador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(ModUsuariosEntUsuarios::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartido()
    {
        return $this->hasOne(WrkPartidos::className(), ['id_partido' => 'id_partido']);
    }
}
