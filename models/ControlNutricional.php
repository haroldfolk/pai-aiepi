<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "control_nutricional".
 *
 * @property integer $id_control
 * @property integer $peso
 * @property integer $talla
 * @property integer $nro_de_carnet
 *
 * @property ActoDeVacunacion[] $actoDeVacunacions
 * @property CarnetDeVacunacion $nroDeCarnet
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
            [['peso', 'talla'], 'required'],
            [['peso', 'talla', 'nro_de_carnet'], 'integer'],
            [['nro_de_carnet'], 'exist', 'skipOnError' => true, 'targetClass' => CarnetDeVacunacion::className(), 'targetAttribute' => ['nro_de_carnet' => 'nro_de_carnet']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_control' => 'Id Control',
            'peso' => 'Peso',
            'talla' => 'Talla',
            'nro_de_carnet' => 'Nro De Carnet',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActoDeVacunacions()
    {
        return $this->hasMany(ActoDeVacunacion::className(), ['id_control' => 'id_control']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNroDeCarnet()
    {
        return $this->hasOne(CarnetDeVacunacion::className(), ['nro_de_carnet' => 'nro_de_carnet']);
    }
}
