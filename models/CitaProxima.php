<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cita_proxima".
 *
 * @property integer $id_cita
 * @property string $fecha_programada
 * @property string $motivo
 * @property integer $id_acto
 *
 * @property ActoDeVacunacion $idActo
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
            [['id_acto'], 'integer'],
            [['motivo'], 'string', 'max' => 50],
            [['id_acto'], 'exist', 'skipOnError' => true, 'targetClass' => ActoDeVacunacion::className(), 'targetAttribute' => ['id_acto' => 'id_acto']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cita' => 'Id Cita',
            'fecha_programada' => 'Fecha Programada',
            'motivo' => 'Motivo',
            'id_acto' => 'Id Acto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdActo()
    {
        return $this->hasOne(ActoDeVacunacion::className(), ['id_acto' => 'id_acto']);
    }
}
