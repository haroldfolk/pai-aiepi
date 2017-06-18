<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carnet_de_vacunacion".
 *
 * @property integer $nro_de_carnet
 * @property string $fecha_de_expedicion
 * @property string $procedencia
 * @property integer $id_paciente
 *
 * @property Paciente $idPaciente
 * @property ControlNutricional[] $controlNutricionals
 */
class CarnetDeVacunacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carnet_de_vacunacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nro_de_carnet', 'fecha_de_expedicion'], 'required'],
            [['nro_de_carnet', 'id_paciente'], 'integer'],
            [['fecha_de_expedicion', 'procedencia'], 'string', 'max' => 50],
            [['id_paciente'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::className(), 'targetAttribute' => ['id_paciente' => 'id_paciente']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nro_de_carnet' => 'Nro De Carnet',
            'fecha_de_expedicion' => 'Fecha De Expedicion',
            'procedencia' => 'Procedencia',
            'id_paciente' => 'Id Paciente',
        ];
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
    public function getControlNutricionals()
    {
        return $this->hasMany(ControlNutricional::className(), ['nro_de_carnet' => 'nro_de_carnet']);
    }
}
