<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wrk_quiniela".
 *
 * @property string $id_quiniela
 * @property string $id_usuario Registro identificador para el usuario
 * @property string $id_partido Registro identificador del partido
 * @property string $id_equipo1 Numero identificador del equipo seleccionado
 * @property string $id_equipo2 Numero identificador del equipo seleccionado
 * @property int $num_goles_equipo1 Pronostico de goles para el equipo seleccionado
 * @property int $num_goles_equipo2 Pronostico de goles para el equipo seleccionado
 * @property string $fch_creacion Fecha de creacion del registro
 * @property string $b_acertado Dato indicador del usuario que acerto en el pronostico
 *
 * @property CatEquipos $equipo1
 * @property CatEquipos $equipo2
 * @property ModUsuariosEntUsuarios $usuario
 * @property WrkPartidos $partido
 */
class WrkQuiniela extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wrk_quiniela';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_partido', 'id_equipo1', 'id_equipo2', 'num_goles_equipo1', 'num_goles_equipo2', 'b_acertado'], 'integer'],
            [['fch_creacion'], 'safe'],
            [['id_equipo1'], 'exist', 'skipOnError' => true, 'targetClass' => CatEquipos::className(), 'targetAttribute' => ['id_equipo1' => 'id_equipo']],
            [['id_equipo2'], 'exist', 'skipOnError' => true, 'targetClass' => CatEquipos::className(), 'targetAttribute' => ['id_equipo2' => 'id_equipo']],
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
            'id_quiniela' => 'Id Quiniela',
            'id_usuario' => 'Id Usuario',
            'id_partido' => 'Id Partido',
            'id_equipo1' => 'Id Equipo1',
            'id_equipo2' => 'Id Equipo2',
            'num_goles_equipo1' => 'Num Goles Equipo1',
            'num_goles_equipo2' => 'Num Goles Equipo2',
            'fch_creacion' => 'Fch Creacion',
            'b_acertado' => 'B Acertado',
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
