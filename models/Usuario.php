<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id
 * @property string $nick
 * @property string $clave
 * @property integer $id_personal
 * @property string $role
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
            [['nick', 'clave'], 'string', 'max' => 100],
            [['role'], 'string', 'max' => 50],
            [['id_personal'], 'exist', 'skipOnError' => true, 'targetClass' => Personal::className(), 'targetAttribute' => ['id_personal' => 'id_personal']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nick' => Yii::t('app', 'Nick'),
            'clave' => Yii::t('app', 'Clave'),
            'id_personal' => Yii::t('app', 'Id Personal'),
            'role' => Yii::t('app', 'Role'),
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
        return $this->hasMany(UsuarioPermiso::className(), ['id_usuario' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPermisos()
    {
        return $this->hasMany(Permiso::className(), ['id_permiso' => 'id_permiso'])->viaTable('usuario_permiso', ['id_usuario' => 'id']);
    }
}
