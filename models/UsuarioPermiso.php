<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_permiso".
 *
 * @property integer $id_permiso
 * @property integer $id_usuario
 *
 * @property Permiso $idPermiso
 * @property Usuario $idUsuario
 */
class UsuarioPermiso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario_permiso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_permiso', 'id_usuario'], 'required'],
            [['id_permiso', 'id_usuario'], 'integer'],
            [['id_permiso'], 'exist', 'skipOnError' => true, 'targetClass' => Permiso::className(), 'targetAttribute' => ['id_permiso' => 'id_permiso']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_permiso' => 'Id Permiso',
            'id_usuario' => 'Id Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPermiso()
    {
        return $this->hasOne(Permiso::className(), ['id_permiso' => 'id_permiso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id_usuario' => 'id_usuario']);
    }
}
