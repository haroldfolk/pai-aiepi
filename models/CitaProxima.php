<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cita_proxima".
 *
 * @property integer $id_cita
 * @property string $fecha_programada
 * @property string $motivo
 * @property integer $id_paciente
 *
 * @property Paciente $idPaciente
 */
class CitaProxima extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cita_proxima';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_programada', 'motivo'], 'required'],
            [['fecha_programada'], 'safe'],
            [['id_paciente'], 'integer'],
            [['motivo'], 'string', 'max' => 50],
            [['id_paciente'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::className(), 'targetAttribute' => ['id_paciente' => 'id_paciente']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cita' => Yii::t('app', 'Id Cita'),
            'fecha_programada' => Yii::t('app', 'Fecha Programada'),
            'motivo' => Yii::t('app', 'Motivo'),
            'id_paciente' => Yii::t('app', 'Id Paciente'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPaciente()
    {
        return $this->hasOne(Paciente::className(), ['id_paciente' => 'id_paciente']);
    }
}
