<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_fases_del_torneo".
 *
 * @property string $id_fase
 * @property string $txt_nombre_fase
 * @property string $fch_inicio
 * @property string $fch_termino
 * @property string $b_habilitado
 *
 * @property CatCodigos[] $catCodigos
 */
class CatFasesDelTorneo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_fases_del_torneo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fase', 'txt_nombre_fase', 'fch_inicio', 'fch_termino'], 'required'],
            [['id_fase', 'b_habilitado'], 'integer'],
            [['fch_inicio', 'fch_termino'], 'safe'],
            [['txt_nombre_fase'], 'string', 'max' => 50],
            [['id_fase'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_fase' => 'Id Fase',
            'txt_nombre_fase' => 'Txt Nombre Fase',
            'fch_inicio' => 'Fch Inicio',
            'fch_termino' => 'Fch Termino',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatCodigos()
    {
        return $this->hasMany(CatCodigos::className(), ['id_fase' => 'id_fase']);
    }
}
