<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paciente".
 *
 * @property integer $id_paciente
 * @property string $nombre
 * @property string $apellidos
 * @property string $sexo
 * @property string $fecha_de_nacimiento
 * @property integer $id_centro
 *
 * @property ActoDeVacunacion[] $actoDeVacunacions
 * @property CarnetDeVacunacion[] $carnetDeVacunacions
 * @property CentroDeSalud $idCentro
 */
class Paciente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paciente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'apellidos', 'sexo', 'fecha_de_nacimiento'], 'required'],
            [['fecha_de_nacimiento'], 'safe'],
            [['id_centro'], 'integer'],
            [['nombre', 'apellidos'], 'string', 'max' => 50],
            [['sexo'], 'string', 'max' => 1],
            [['id_centro'], 'exist', 'skipOnError' => true, 'targetClass' => CentroDeSalud::className(), 'targetAttribute' => ['id_centro' => 'id_centro']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_paciente' => 'Id Paciente',
            'nombre' => 'Nombre',
            'apellidos' => 'Apellidos',
            'sexo' => 'Sexo',
            'fecha_de_nacimiento' => 'Fecha De Nacimiento',
            'id_centro' => 'Id Centro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActoDeVacunacions()
    {
        return $this->hasMany(ActoDeVacunacion::className(), ['id_paciente' => 'id_paciente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarnetDeVacunacions()
    {
        return $this->hasMany(CarnetDeVacunacion::className(), ['id_paciente' => 'id_paciente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCentro()
    {
        return $this->hasOne(CentroDeSalud::className(), ['id_centro' => 'id_centro']);
    }
}
