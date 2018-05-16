<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wrk_partidos".
 *
 * @property string $id_partido
 * @property string $id_equipo1 Numero identificador del equipo seleccionado
 * @property string $id_equipo2 Numero identificador del equipo seleccionado
 * @property string $fch_partido Fecha del partido
 * @property int $num_goles_equipo1 Numero de goles anotados por el equipo
 * @property int $num_goles_equipo2 Numero de goles anotados por el equipo
 * @property string $b_habilirado Dato implementado para habilitar el registro
 *
 * @property CatEquipos $equipo1
 * @property CatEquipos $equipo2
 * @property WrkQuiniela[] $wrkQuinielas
 */
class WrkPartidos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wrk_partidos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_equipo1', 'id_equipo2', 'num_goles_equipo1', 'num_goles_equipo2', 'b_habilirado'], 'integer'],
            [['fch_partido'], 'safe'],
            [['id_equipo1'], 'exist', 'skipOnError' => true, 'targetClass' => CatEquipos::className(), 'targetAttribute' => ['id_equipo1' => 'id_equipo']],
            [['id_equipo2'], 'exist', 'skipOnError' => true, 'targetClass' => CatEquipos::className(), 'targetAttribute' => ['id_equipo2' => 'id_equipo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_partido' => 'Id Partido',
            'id_equipo1' => 'Id Equipo1',
            'id_equipo2' => 'Id Equipo2',
            'fch_partido' => 'Fch Partido',
            'num_goles_equipo1' => 'Num Goles Equipo1',
            'num_goles_equipo2' => 'Num Goles Equipo2',
            'b_habilirado' => 'B Habilirado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipo1()
    {
        return $this->hasOne(CatEquipos::className(), ['id_equipo' => 'id_equipo1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipo2()
    {
        return $this->hasOne(CatEquipos::className(), ['id_equipo' => 'id_equipo2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWrkQuinielas()
    {
        return $this->hasMany(WrkQuiniela::className(), ['id_partido' => 'id_partido']);
    }
}
