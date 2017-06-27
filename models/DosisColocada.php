<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dosis_colocada".
 *
 * @property string $descripcion
 * @property integer $id_acto
 * @property integer $id_dosis
 *
 * @property Dosis $idDosis
 * @property ActoDeVacunacion $idActo
 */
class DosisColocada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dosis_colocada';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_acto', 'id_dosis'], 'required'],
            [['id_acto', 'id_dosis'], 'integer'],
            [['descripcion'], 'string', 'max' => 50],
            [['id_dosis'], 'exist', 'skipOnError' => true, 'targetClass' => Dosis::className(), 'targetAttribute' => ['id_dosis' => 'id_dosis']],
            [['id_acto'], 'exist', 'skipOnError' => true, 'targetClass' => ActoDeVacunacion::className(), 'targetAttribute' => ['id_acto' => 'id_acto']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'descripcion' => Yii::t('app', 'Descripcion'),
            'id_acto' => Yii::t('app', 'Id Acto'),
            'id_dosis' => Yii::t('app', 'Id Dosis'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDosis()
    {
        return $this->hasOne(Dosis::className(), ['id_dosis' => 'id_dosis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdActo()
    {
        return $this->hasOne(ActoDeVacunacion::className(), ['id_acto' => 'id_acto']);
    }
}
