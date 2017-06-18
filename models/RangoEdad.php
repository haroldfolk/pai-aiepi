<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rango_edad".
 *
 * @property integer $id_rango
 * @property integer $desde
 * @property integer $hasta
 * @property string $observaciones
 *
 * @property VacunaRango[] $vacunaRangos
 * @property Vacuna[] $idVacunas
 */
class RangoEdad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rango_edad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rango', 'desde', 'hasta'], 'required'],
            [['id_rango', 'desde', 'hasta'], 'integer'],
            [['observaciones'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_rango' => 'Id Rango',
            'desde' => 'Desde',
            'hasta' => 'Hasta',
            'observaciones' => 'Observaciones',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacunaRangos()
    {
        return $this->hasMany(VacunaRango::className(), ['id_rango' => 'id_rango']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdVacunas()
    {
        return $this->hasMany(Vacuna::className(), ['id_vacuna' => 'id_vacuna'])->viaTable('vacuna_rango', ['id_rango' => 'id_rango']);
    }
}
