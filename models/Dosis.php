<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dosis".
 *
 * @property integer $id_dosis
 * @property string $descripcion
 * @property integer $meses_minimo
 * @property integer $meses_maximo
 * @property integer $id_vacuna
 * @property integer $id_metodo
 *
 * @property MetodoAplicacion $idMetodo
 * @property Vacuna $idVacuna
 * @property DosisColocada[] $dosisColocadas
 * @property ActoDeVacunacion[] $idActos
 */
class Dosis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dosis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['meses_minimo', 'meses_maximo', 'id_vacuna', 'id_metodo'], 'integer'],
            [['descripcion'], 'string', 'max' => 255],
            [['id_metodo'], 'exist', 'skipOnError' => true, 'targetClass' => MetodoAplicacion::className(), 'targetAttribute' => ['id_metodo' => 'id_metodo']],
            [['id_vacuna'], 'exist', 'skipOnError' => true, 'targetClass' => Vacuna::className(), 'targetAttribute' => ['id_vacuna' => 'id_vacuna']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_dosis' => Yii::t('app', 'Id Dosis'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'meses_minimo' => Yii::t('app', 'Meses Minimo'),
            'meses_maximo' => Yii::t('app', 'Meses Maximo'),
            'id_vacuna' => Yii::t('app', 'Id Vacuna'),
            'id_metodo' => Yii::t('app', 'Id Metodo'),
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
    public function getIdVacuna()
    {
        return $this->hasOne(Vacuna::className(), ['id_vacuna' => 'id_vacuna']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDosisColocadas()
    {
        return $this->hasMany(DosisColocada::className(), ['id_dosis' => 'id_dosis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdActos()
    {
        return $this->hasMany(ActoDeVacunacion::className(), ['id_acto' => 'id_acto'])->viaTable('dosis_colocada', ['id_dosis' => 'id_dosis']);
    }
}
