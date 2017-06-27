<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "control_nutricional".
 *
 * @property integer $id_control
 * @property integer $peso
 * @property integer $talla
 * @property string $fecha
 * @property integer $id_paciente
 * @property integer $id_personal
 *
 * @property Paciente $idPaciente
 * @property Personal $idPersonal
 */
class ControlNutricional extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'control_nutricional';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['peso', 'talla', 'fecha'], 'required'],
            [['peso', 'talla', 'id_paciente', 'id_personal'], 'integer'],
            [['fecha'], 'safe'],
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
            'id_control' => Yii::t('app', 'Id Control'),
            'peso' => Yii::t('app', 'Peso'),
            'talla' => Yii::t('app', 'Talla'),
            'fecha' => Yii::t('app', 'Fecha'),
            'id_paciente' => Yii::t('app', 'Id Paciente'),
            'id_personal' => Yii::t('app', 'Id Personal'),
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
    public function getIdPersonal()
    {
        return $this->hasOne(Personal::className(), ['id_personal' => 'id_personal']);
    }
}
