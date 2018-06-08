<?php

namespace app\models;

use Yii;
use app\modules\ModUsuarios\models\EntUsuarios;

/**
 * This is the model class for table "rel_usuarios_codigos".
 *
 * @property string $id_usuario
 * @property string $id_codigo
 * @property string $b_habilitado
 *
 * @property CatCodigos $codigo
 * @property ModUsuariosEntUsuarios $usuario
 */
class RelUsuariosCodigos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rel_usuarios_codigos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_codigo'], 'required'],
            [['id_usuario', 'id_codigo', 'b_habilitado'], 'integer'],
            [['id_usuario', 'id_codigo'], 'unique', 'targetAttribute' => ['id_usuario', 'id_codigo']],
            [['id_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => CatCodigos::className(), 'targetAttribute' => ['id_codigo' => 'id_codigo']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => EntUsuarios::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'id_codigo' => 'Id Codigo',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodigo()
    {
        return $this->hasOne(CatCodigos::className(), ['id_codigo' => 'id_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(ModUsuariosEntUsuarios::className(), ['id_usuario' => 'id_usuario']);
    }
}
