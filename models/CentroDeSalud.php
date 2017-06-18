<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "centro_de_salud".
 *
 * @property integer $id_centro
 * @property string $nombre
 * @property string $direccion
 * @property string $telefono
 *
 * @property Paciente[] $pacientes
 * @property Personal[] $personals
 * @property Refrigerador[] $refrigeradors
 */
class CentroDeSalud extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'centro_de_salud';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'direccion'], 'required'],
            [['nombre', 'direccion'], 'string', 'max' => 50],
            [['telefono'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_centro' => 'Id Centro',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPacientes()
    {
        return $this->hasMany(Paciente::className(), ['id_centro' => 'id_centro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonals()
    {
        return $this->hasMany(Personal::className(), ['id_centro' => 'id_centro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefrigeradors()
    {
        return $this->hasMany(Refrigerador::className(), ['id_centro' => 'id_centro']);
    }
}
