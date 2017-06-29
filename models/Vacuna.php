<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vacuna".
 *
 * @property integer $id_vacuna
 * @property string $nombre
 * @property integer $nro_dosis
 * @property string $unidad_de_medida
 * @property string $descripcion
 * @property integer $id_metodo
 *
 * @property Dosis[] $doses
 */
class Vacuna extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacuna';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'nro_dosis', 'unidad_de_medida'], 'required'],
            [['nro_dosis'/*, 'id_metodo'*/], 'integer'],
            [['nombre', 'descripcion'], 'string', 'max' => 50],
            [['unidad_de_medida'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_vacuna' => Yii::t('app', 'Id Vacuna'),
            'nombre' => Yii::t('app', 'Nombre'),
            'nro_dosis' => Yii::t('app', 'Nro Dosis'),
            'unidad_de_medida' => Yii::t('app', 'Unidad De Medida'),
            'descripcion' => Yii::t('app', 'Descripcion'),
//            'id_metodo' => Yii::t('app', 'Id Metodo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoses()
    {
        return $this->hasMany(Dosis::className(), ['id_vacuna' => 'id_vacuna']);
    }
}
