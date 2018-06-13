<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_codigos".
 *
 * @property string $id_codigo Numero identificador del codigo
 * @property string $txt_codigo Codigo de accseso a la quiniela
 * @property string $id_fase Numero identificador de la fase
 * @property string $b_habilitado Numero empleado para el borrado logico
 * @property string $b_codigo_usado Numero empleado para determinar cuando un codigo ya se ha usado
 *
 * @property CatFasesDelTorneo $fase
 * @property RelUsuariosCodigos[] $relUsuariosCodigos
 * @property ModUsuariosEntUsuarios[] $usuarios
 */
class CatCodigos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_codigos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_codigo'], 'required'],
            [['id_fase', 'b_habilitado', 'b_codigo_usado'], 'integer'],
            [['txt_codigo'], 'string', 'max' => 50],
            [['txt_codigo'], 'unique'],
            [['id_fase'], 'exist', 'skipOnError' => true, 'targetClass' => CatFasesDelTorneo::className(), 'targetAttribute' => ['id_fase' => 'id_fase']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_codigo' => 'Id Codigo',
            'txt_codigo' => 'Código',
            'id_fase' => 'Id Fase',
            'b_habilitado' => 'B Habilitado',
            'b_codigo_usado' => 'B Codigo Usado',
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
    public function getRelUsuariosCodigos()
    {
        return $this->hasMany(RelUsuariosCodigos::className(), ['id_codigo' => 'id_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(ModUsuariosEntUsuarios::className(), ['id_usuario' => 'id_usuario'])->viaTable('rel_usuarios_codigos', ['id_codigo' => 'id_codigo']);
    }
}
