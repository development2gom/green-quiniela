<?php

namespace app\models;

use Yii;
use app\modules\ModUsuarios\models\EntUsuarios;

/**
 * This is the model class for table "wrk_quiniela".
 *
 * @property string $id_quiniela
 * @property string $id_usuario Registro identificador para el usuario
 * @property string $id_partido Registro identificador del partido
 * @property string $fch_creacion Fecha de creacion del registro
 * @property string $b_acertado Dato indicador del usuario que acerto en el pronostico
 * @property string $b_empata
 * @property string $id_equipo_ganador
 *
 * @property CatEquipos $equipoGanador
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
            [['id_usuario', 'id_partido', 'b_acertado', 'b_empata', 'id_equipo_ganador'], 'integer'],
            [['fch_creacion'], 'safe'],
            [['id_equipo_ganador'], 'exist', 'skipOnError' => true, 'targetClass' => CatEquipos::className(), 'targetAttribute' => ['id_equipo_ganador' => 'id_equipo']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => EntUsuarios::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
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
            'fch_creacion' => 'Fch Creacion',
            'b_acertado' => 'B Acertado',
            'b_empata' => 'B Empata',
            'id_equipo_ganador' => 'Id Equipo Ganador',
        ];
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
    public function getUsuario()
    {
        return $this->hasOne(EntUsuarios::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartido()
    {
        return $this->hasOne(WrkPartidos::className(), ['id_partido' => 'id_partido']);
    }
}
