<?php

namespace app\models;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];


    /**
     * @inheritdoc
     */
//    public static function findIdentity($id)
//    {
//        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
//    }
    public static function findIdentity($id)
    {
        //select * from Usuarios where id=$id
        $u = Usuario::find()->where(['id' => $id])->one();
        if (isset($u)) {
            $usuarioLogueado = new User();
            $usuarioLogueado->username = $u->nick;
            $usuarioLogueado->password = $u->clave;
            $usuarioLogueado->id = $u->id;
            return new static($usuarioLogueado);
        } else {
            return null;
        }
    }
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
//    public static function findByUsername($username)
//    {
//        foreach (self::$users as $user) {
//            if (strcasecmp($user['username'], $username) === 0) {
//                return new static($user);
//            }
//        }
//
//        return null;
//    }
    public static function findByUsername($username)
    {
//        foreach (self::$users as $user) {
//            if (strcasecmp($user['username'], $username) === 0) {
//                return new static($user);
//            }
//        }
        $usuarioDB = Usuario::find()->where(['nick' => $username])->one();
        if (isset($usuarioDB)) {
            $usuarioLogueado = new User();
            $usuarioLogueado->username = $usuarioDB->nick;
            $usuarioLogueado->password = $usuarioDB->clave;
            $usuarioLogueado->id = $usuarioDB->id;
            return $usuarioLogueado;
        }

        return null;
    }
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }
    public static function getIdPersonal($id)
    {
        return Usuario::findOne(['id'=>$id])->id_personal;
    }
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === crypt($this->username,$this->username);
    }
}
