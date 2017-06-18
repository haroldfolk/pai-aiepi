<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "metodo_aplicacion".
 *
 * @property integer $id_metodo
 * @property string $tipo
 * @property string $descripcion
 *
 * @property Vacuna[] $vacunas
 */
class MetodoAplicacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'metodo_aplicacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo'], 'required'],
            [['tipo', 'descripcion'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_metodo' => 'Id Metodo',
            'tipo' => 'Tipo',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacunas()
    {
        return $this->hasMany(Vacuna::className(), ['id_metodo' => 'id_metodo']);
    }
}
