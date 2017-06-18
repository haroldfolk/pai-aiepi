<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cadena_de_frio".
 *
 * @property integer $nro_control
 * @property string $fecha
 * @property integer $temperatura
 * @property string $turno
 * @property integer $id_personal
 * @property integer $id_refrigerador
 *
 * @property Personal $idPersonal
 * @property Refrigerador $idRefrigerador
 */
class CadenaDeFrio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cadena_de_frio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'temperatura', 'turno'], 'required'],
            [['fecha'], 'safe'],
            [['temperatura', 'id_personal', 'id_refrigerador'], 'integer'],
            [['turno'], 'string', 'max' => 10],
            [['id_personal'], 'exist', 'skipOnError' => true, 'targetClass' => Personal::className(), 'targetAttribute' => ['id_personal' => 'id_personal']],
            [['id_refrigerador'], 'exist', 'skipOnError' => true, 'targetClass' => Refrigerador::className(), 'targetAttribute' => ['id_refrigerador' => 'id_refrigerador']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nro_control' => 'Nro Control',
            'fecha' => 'Fecha',
            'temperatura' => 'Temperatura',
            'turno' => 'Turno',
            'id_personal' => 'Id Personal',
            'id_refrigerador' => 'Id Refrigerador',
        ];
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
    public function getIdRefrigerador()
    {
        return $this->hasOne(Refrigerador::className(), ['id_refrigerador' => 'id_refrigerador']);
    }
}
