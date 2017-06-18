<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vacuna_rango".
 *
 * @property integer $id_rango
 * @property integer $id_vacuna
 *
 * @property RangoEdad $idRango
 * @property Vacuna $idVacuna
 */
class VacunaRango extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacuna_rango';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rango', 'id_vacuna'], 'required'],
            [['id_rango', 'id_vacuna'], 'integer'],
            [['id_rango'], 'exist', 'skipOnError' => true, 'targetClass' => RangoEdad::className(), 'targetAttribute' => ['id_rango' => 'id_rango']],
            [['id_vacuna'], 'exist', 'skipOnError' => true, 'targetClass' => Vacuna::className(), 'targetAttribute' => ['id_vacuna' => 'id_vacuna']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_rango' => 'Id Rango',
            'id_vacuna' => 'Id Vacuna',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRango()
    {
        return $this->hasOne(RangoEdad::className(), ['id_rango' => 'id_rango']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdVacuna()
    {
        return $this->hasOne(Vacuna::className(), ['id_vacuna' => 'id_vacuna']);
    }
}
