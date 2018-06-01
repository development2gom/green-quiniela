<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_usuarios_quiniela".
 *
 * @property string $id_usuario
 * @property string $id_fase
 * @property string $fch_termino
 *
 * @property CatFasesDelTorneo $fase
 * @property ModUsuariosEntUsuarios $usuario
 */
class EntUsuariosQuiniela extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_usuarios_quiniela';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_fase', 'fch_termino'], 'required'],
            [['id_usuario', 'id_fase'], 'integer'],
            [['fch_termino'], 'safe'],
            [['id_fase'], 'exist', 'skipOnError' => true, 'targetClass' => CatFasesDelTorneo::className(), 'targetAttribute' => ['id_fase' => 'id_fase']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => ModUsuariosEntUsuarios::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'id_fase' => 'Id Fase',
            'fch_termino' => 'Fch Termino',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFase()
    {
        return $this->hasOne(CatFasesDelTorneo::className(), ['id_fase' => 'id_fase']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(ModUsuariosEntUsuarios::className(), ['id_usuario' => 'id_usuario']);
    }
}
