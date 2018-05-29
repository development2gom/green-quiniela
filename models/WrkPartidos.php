<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wrk_partidos".
 *
 * @property string $id_partido
 * @property string $txt_token
 * @property string $id_equipo1 Numero identificador del equipo seleccionado
 * @property string $id_equipo2 Numero identificador del equipo seleccionado
 * @property string $fch_partido Fecha del partido
 * @property string $b_habilitado Dato implementado para habilitar el registro
 * @property string $b_empate
 * @property string $id_fase
 * @property string $id_equipo_ganador
 * @property string $b_resuelto
 * @property string $txt_grupo
 *
 * @property CatEquipos $equipo1
 * @property CatEquipos $equipo2
 * @property CatEquipos $equipoGanador
 * @property CatFasesDelTorneo $fase
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
            [['id_equipo1', 'id_equipo2', 'b_habilitado', 'b_empate', 'id_fase', 'id_equipo_ganador', 'b_resuelto'], 'integer'],
            [['fch_partido'], 'safe'],
            [['id_fase'], 'required'],
            [['txt_token'], 'string', 'max' => 100],
            [['txt_grupo'], 'string', 'max' => 50],
            [['id_equipo1'], 'exist', 'skipOnError' => true, 'targetClass' => CatEquipos::className(), 'targetAttribute' => ['id_equipo1' => 'id_equipo']],
            [['id_equipo2'], 'exist', 'skipOnError' => true, 'targetClass' => CatEquipos::className(), 'targetAttribute' => ['id_equipo2' => 'id_equipo']],
            [['id_equipo_ganador'], 'exist', 'skipOnError' => true, 'targetClass' => CatEquipos::className(), 'targetAttribute' => ['id_equipo_ganador' => 'id_equipo']],
            [['id_fase'], 'exist', 'skipOnError' => true, 'targetClass' => CatFasesDelTorneo::className(), 'targetAttribute' => ['id_fase' => 'id_fase']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_partido' => 'Id Partido',
            'txt_token' => 'Txt Token',
            'id_equipo1' => 'Local',
            'id_equipo2' => 'Visita',
            'fch_partido' => 'Fch Partido',
            'b_habilitado' => 'B Habilitado',
            'b_empate' => 'B Empate',
            'id_fase' => 'Id Fase',
            'id_equipo_ganador' => 'Id Equipo Ganador',
            'b_resuelto' => 'B Resuelto',
            'txt_grupo' => 'Txt Grupo',
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
    public function getEquipoGanador()
    {
        return $this->hasOne(CatEquipos::className(), ['id_equipo' => 'id_equipo_ganador']);
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
    public function getWrkQuinielas()
    {
        return $this->hasMany(WrkQuiniela::className(), ['id_partido' => 'id_partido']);
    }
}
