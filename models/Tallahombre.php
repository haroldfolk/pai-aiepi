<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tallahombre".
 *
 * @property integer $mes
 * @property string $talla_baja_critica
 * @property string $talla_muy_baja
 * @property string $talla_baja
 * @property string $talla_normal
 * @property string $talla_alta
 * @property string $talla_alta_relativa
 * @property string $talla_alta_critica
 */
class Tallahombre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tallahombre';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mes', 'talla_baja_critica', 'talla_muy_baja', 'talla_baja', 'talla_normal', 'talla_alta', 'talla_alta_relativa', 'talla_alta_critica'], 'required'],
            [['mes'], 'integer'],
            [['talla_baja_critica', 'talla_muy_baja', 'talla_baja', 'talla_normal', 'talla_alta', 'talla_alta_relativa', 'talla_alta_critica'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mes' => Yii::t('app', 'Mes'),
            'talla_baja_critica' => Yii::t('app', 'Talla Baja Critica'),
            'talla_muy_baja' => Yii::t('app', 'Talla Muy Baja'),
            'talla_baja' => Yii::t('app', 'Talla Baja'),
            'talla_normal' => Yii::t('app', 'Talla Normal'),
            'talla_alta' => Yii::t('app', 'Talla Alta'),
            'talla_alta_relativa' => Yii::t('app', 'Talla Alta Relativa'),
            'talla_alta_critica' => Yii::t('app', 'Talla Alta Critica'),
        ];
    }
}
