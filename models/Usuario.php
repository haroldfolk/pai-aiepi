<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id_usuario
 * @property string $nick
 * @property string $clave
 * @property integer $id_personal
 *
 * @property Personal $idPersonal
 * @property UsuarioPermiso[] $usuarioPermisos
 * @property Permiso[] $idPermisos
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nick', 'clave'], 'required'],
            [['id_personal'], 'integer'],
            [['nick', 'clave'], 'string', 'max' => 20],
            [['id_personal'], 'exist', 'skipOnError' => true, 'targetClass' => Personal::className(), 'targetAttribute' => ['id_personal' => 'id_personal']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'nick' => 'Nick',
            'clave' => 'Clave',
            'id_personal' => 'Id Personal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersonal()
    {
        return $this->hasOne(Personal::className(), ['id_personal' => 'id_personal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioPermisos()
    {
        return $this->hasMany(UsuarioPermiso::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPermisos()
    {
        return $this->hasMany(Permiso::className(), ['id_permiso' => 'id_permiso'])->viaTable('usuario_permiso', ['id_usuario' => 'id_usuario']);
    }
}
