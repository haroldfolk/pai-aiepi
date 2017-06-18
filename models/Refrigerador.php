<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "refrigerador".
 *
 * @property integer $id_refrigerador
 * @property string $modelo
 * @property string $marca
 * @property string $descripcion
 * @property integer $id_centro
 *
 * @property CadenaDeFrio[] $cadenaDeFrios
 * @property CentroDeSalud $idCentro
 */
class Refrigerador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'refrigerador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modelo', 'marca'], 'required'],
            [['id_centro'], 'integer'],
            [['modelo', 'marca', 'descripcion'], 'string', 'max' => 50],
            [['id_centro'], 'exist', 'skipOnError' => true, 'targetClass' => CentroDeSalud::className(), 'targetAttribute' => ['id_centro' => 'id_centro']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_refrigerador' => 'Id Refrigerador',
            'modelo' => 'Modelo',
            'marca' => 'Marca',
            'descripcion' => 'Descripcion',
            'id_centro' => 'Id Centro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCadenaDeFrios()
    {
        return $this->hasMany(CadenaDeFrio::className(), ['id_refrigerador' => 'id_refrigerador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCentro()
    {
        return $this->hasOne(CentroDeSalud::className(), ['id_centro' => 'id_centro']);
    }
}
