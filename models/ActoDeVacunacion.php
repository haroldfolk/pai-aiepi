<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acto_de_vacunacion".
 *
 * @property integer $id_acto
 * @property string $fecha
 * @property string $observaciones
 * @property integer $id_paciente
 * @property integer $id_personal
 * @property integer $id_control
 *
 * @property ControlNutricional $idControl
 * @property Paciente $idPaciente
 * @property Personal $idPersonal
 * @property CitaProxima[] $citaProximas
 * @property VacunaActo[] $vacunaActos
 * @property Vacuna[] $idVacunas
 */
class ActoDeVacunacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'acto_de_vacunacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha'], 'required'],
            [['fecha'], 'safe'],
            [['id_paciente', 'id_personal', 'id_control'], 'integer'],
            [['observaciones'], 'string', 'max' => 100],
            [['id_control'], 'exist', 'skipOnError' => true, 'targetClass' => ControlNutricional::className(), 'targetAttribute' => ['id_control' => 'id_control']],
            [['id_paciente'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::className(), 'targetAttribute' => ['id_paciente' => 'id_paciente']],
            [['id_personal'], 'exist', 'skipOnError' => true, 'targetClass' => Personal::className(), 'targetAttribute' => ['id_personal' => 'id_personal']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_acto' => 'Id Acto',
            'fecha' => 'Fecha',
            'observaciones' => 'Observaciones',
            'id_paciente' => 'Id Paciente',
            'id_personal' => 'Id Personal',
            'id_control' => 'Id Control',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdControl()
    {
        return $this->hasOne(ControlNutricional::className(), ['id_control' => 'id_control']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPaciente()
    {
        return $this->hasOne(Paciente::className(), ['id_paciente' => 'id_paciente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersonal()
    {
        return $this->hasOne(Personal::className(), ['id_personal' => 'id_personal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCitaProximas()
    {
        return $this->hasMany(CitaProxima::className(), ['id_acto' => 'id_acto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacunaActos()
    {
        return $this->hasMany(VacunaActo::className(), ['id_acto' => 'id_acto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdVacunas()
    {
        return $this->hasMany(Vacuna::className(), ['id_vacuna' => 'id_vacuna'])->viaTable('vacuna_acto', ['id_acto' => 'id_acto']);
    }
}
