<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permiso".
 *
 * @property integer $id_permiso
 * @property string $nombre
 * @property string $tipo
 *
 * @property UsuarioPermiso[] $usuarioPermisos
 * @property Usuario[] $idUsuarios
 */
class Permiso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'permiso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre', 'tipo'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_permiso' => 'Id Permiso',
            'nombre' => 'Nombre',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioPermisos()
    {
        return $this->hasMany(UsuarioPermiso::className(), ['id_permiso' => 'id_permiso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['id_usuario' => 'id_usuario'])->viaTable('usuario_permiso', ['id_permiso' => 'id_permiso']);
    }
}
