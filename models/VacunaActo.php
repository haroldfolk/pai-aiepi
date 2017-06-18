<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vacuna_acto".
 *
 * @property integer $id_vacuna
 * @property integer $id_acto
 * @property string $dosis_colocada
 *
 * @property ActoDeVacunacion $idActo
 * @property Vacuna $idVacuna
 */
class VacunaActo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacuna_acto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_vacuna', 'id_acto'], 'required'],
            [['id_vacuna', 'id_acto'], 'integer'],
            [['dosis_colocada'], 'string', 'max' => 50],
            [['id_acto'], 'exist', 'skipOnError' => true, 'targetClass' => ActoDeVacunacion::className(), 'targetAttribute' => ['id_acto' => 'id_acto']],
            [['id_vacuna'], 'exist', 'skipOnError' => true, 'targetClass' => Vacuna::className(), 'targetAttribute' => ['id_vacuna' => 'id_vacuna']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_vacuna' => 'Id Vacuna',
            'id_acto' => 'Id Acto',
            'dosis_colocada' => 'Dosis Colocada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdActo()
    {
        return $this->hasOne(ActoDeVacunacion::className(), ['id_acto' => 'id_acto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdVacuna()
    {
        return $this->hasOne(Vacuna::className(), ['id_vacuna' => 'id_vacuna']);
    }
}
