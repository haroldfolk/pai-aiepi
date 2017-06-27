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
 *
 * @property Paciente $idPaciente
 * @property Personal $idPersonal
 * @property DosisColocada[] $dosisColocadas
 * @property Dosis[] $idDoses
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
            [['id_paciente', 'id_personal'], 'integer'],
            [['observaciones'], 'string', 'max' => 100],
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
            'id_acto' => Yii::t('app', 'Id Acto'),
            'fecha' => Yii::t('app', 'Fecha'),
            'observaciones' => Yii::t('app', 'Observaciones'),
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDosisColocadas()
    {
        return $this->hasMany(DosisColocada::className(), ['id_acto' => 'id_acto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDoses()
    {
        return $this->hasMany(Dosis::className(), ['id_dosis' => 'id_dosis'])->viaTable('dosis_colocada', ['id_acto' => 'id_acto']);
    }
}
