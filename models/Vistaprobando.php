<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vistaprobando".
 *
 * @property integer $id_control
 * @property integer $peso
 * @property integer $talla
 * @property string $fecha
 * @property integer $id_paciente
 * @property integer $id_personal
 */
class Vistaprobando extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vistaprobando';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_control', 'peso', 'talla', 'id_paciente', 'id_personal'], 'integer'],
            [['peso', 'talla', 'fecha'], 'required'],
            [['fecha'], 'safe'],
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
}
