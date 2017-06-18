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
 * @property MetodoAplicacion $idMetodo
 * @property VacunaActo[] $vacunaActos
 * @property ActoDeVacunacion[] $idActos
 * @property VacunaRango[] $vacunaRangos
 * @property RangoEdad[] $idRangos
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
            [['nro_dosis', 'id_metodo'], 'integer'],
            [['nombre', 'descripcion'], 'string', 'max' => 50],
            [['unidad_de_medida'], 'string', 'max' => 5],
            [['id_metodo'], 'exist', 'skipOnError' => true, 'targetClass' => MetodoAplicacion::className(), 'targetAttribute' => ['id_metodo' => 'id_metodo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_vacuna' => 'Id Vacuna',
            'nombre' => 'Nombre',
            'nro_dosis' => 'Nro Dosis',
            'unidad_de_medida' => 'Unidad De Medida',
            'descripcion' => 'Descripcion',
            'id_metodo' => 'Id Metodo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMetodo()
    {
        return $this->hasOne(MetodoAplicacion::className(), ['id_metodo' => 'id_metodo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacunaActos()
    {
        return $this->hasMany(VacunaActo::className(), ['id_vacuna' => 'id_vacuna']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdActos()
    {
        return $this->hasMany(ActoDeVacunacion::className(), ['id_acto' => 'id_acto'])->viaTable('vacuna_acto', ['id_vacuna' => 'id_vacuna']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacunaRangos()
    {
        return $this->hasMany(VacunaRango::className(), ['id_vacuna' => 'id_vacuna']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRangos()
    {
        return $this->hasMany(RangoEdad::className(), ['id_rango' => 'id_rango'])->viaTable('vacuna_rango', ['id_vacuna' => 'id_vacuna']);
    }
}
