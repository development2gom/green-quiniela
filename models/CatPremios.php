<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_premios".
 *
 * @property int $id_premio
 * @property string $txt_nombre
 * @property int $id_fase
 * @property int $num_lugar
 *
 * @property CatFasesDelTorneo $fase
 */
class CatPremios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_premios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fase', 'num_lugar'], 'required'],
            [['id_fase', 'num_lugar'], 'integer'],
            [['txt_nombre'], 'string', 'max' => 100],
            [['id_fase'], 'exist', 'skipOnError' => true, 'targetClass' => CatFasesDelTorneo::className(), 'targetAttribute' => ['id_fase' => 'id_fase']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_premio' => 'Id Premio',
            'txt_nombre' => 'Txt Nombre',
            'id_fase' => 'Id Fase',
            'num_lugar' => 'Num Lugar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFase()
    {
        return $this->hasOne(CatFasesDelTorneo::className(), ['id_fase' => 'id_fase']);
    }
}
