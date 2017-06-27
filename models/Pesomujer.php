<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pesomujer".
 *
 * @property integer $mes
 * @property string $desnutricion_critica
 * @property string $desnutricion_grave
 * @property string $desnutricion_moderada
 * @property string $peso_normal
 * @property string $sobrepeso
 * @property string $obesidad
 * @property string $obesidad_critica
 */
class Pesomujer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pesomujer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mes', 'desnutricion_critica', 'desnutricion_grave', 'desnutricion_moderada', 'peso_normal', 'sobrepeso', 'obesidad', 'obesidad_critica'], 'required'],
            [['mes'], 'integer'],
            [['desnutricion_critica', 'desnutricion_grave', 'desnutricion_moderada', 'peso_normal', 'sobrepeso', 'obesidad', 'obesidad_critica'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mes' => Yii::t('app', 'Mes'),
            'desnutricion_critica' => Yii::t('app', 'Desnutricion Critica'),
            'desnutricion_grave' => Yii::t('app', 'Desnutricion Grave'),
            'desnutricion_moderada' => Yii::t('app', 'Desnutricion Moderada'),
            'peso_normal' => Yii::t('app', 'Peso Normal'),
            'sobrepeso' => Yii::t('app', 'Sobrepeso'),
            'obesidad' => Yii::t('app', 'Obesidad'),
            'obesidad_critica' => Yii::t('app', 'Obesidad Critica'),
        ];
    }
}
