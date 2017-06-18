<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personal".
 *
 * @property integer $id_personal
 * @property string $nombre
 * @property string $apellido
 * @property string $sexo
 * @property string $turno
 * @property string $direccion
 * @property string $telefono
 * @property integer $id_centro
 * @property integer $id_cargo
 *
 * @property ActoDeVacunacion[] $actoDeVacunacions
 * @property CadenaDeFrio[] $cadenaDeFrios
 * @property Cargo $idCargo
 * @property CentroDeSalud $idCentro
 * @property Usuario[] $usuarios
 */
class Personal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'sexo', 'turno', 'direccion'], 'required'],
            [['id_centro', 'id_cargo'], 'integer'],
            [['nombre', 'apellido', 'direccion'], 'string', 'max' => 50],
            [['sexo'], 'string', 'max' => 1],
            [['turno', 'telefono'], 'string', 'max' => 10],
            [['id_cargo'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::className(), 'targetAttribute' => ['id_cargo' => 'id_cargo']],
            [['id_centro'], 'exist', 'skipOnError' => true, 'targetClass' => CentroDeSalud::className(), 'targetAttribute' => ['id_centro' => 'id_centro']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_personal' => 'Id Personal',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'sexo' => 'Sexo',
            'turno' => 'Turno',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'id_centro' => 'Id Centro',
            'id_cargo' => 'Id Cargo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActoDeVacunacions()
    {
        return $this->hasMany(ActoDeVacunacion::className(), ['id_personal' => 'id_personal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCadenaDeFrios()
    {
        return $this->hasMany(CadenaDeFrio::className(), ['id_personal' => 'id_personal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCargo()
    {
        return $this->hasOne(Cargo::className(), ['id_cargo' => 'id_cargo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCentro()
    {
        return $this->hasOne(CentroDeSalud::className(), ['id_centro' => 'id_centro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['id_personal' => 'id_personal']);
    }
}
