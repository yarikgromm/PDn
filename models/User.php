<?php

namespace app\models;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['staff_id', 'login', 'password_hash'], 'required'],
            [['staff_id'], 'integer'],
            [['login', 'password_hash'], 'string', 'max' => 255],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
//     public function attributeLabels()
//     {
//         return [
//             'staff_id' => 'Staff ID',
//             'login' => 'Login',
//             'password_hash' => 'Password Hash',
//         ];
//     }
//     private static $users = [
//         '100' => [
//             'id' => '100',
//             'username' => 'admin',
//             'password' => 'admin',
//             'authKey' => 'test100key',
//             'accessToken' => '100-token',
//         ],
//         '101' => [
//             'id' => '101',
//             'username' => 'demo',
//             'password' => 'demo',
//             'authKey' => 'test101key',
//             'accessToken' => '101-token',
//         ],
//     ];


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
//         return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        $user = self::findOne($id);
        $user->id = $user->staff_id;
        $user->username = $user->login;
        $user->password = $user->password_hash;
        $user->authKey = $user->password_hash;
        $user->accessToken = $user->password_hash;
        return new static($user);
    }

    /**
     * {@inheritdoc}
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
    public static function findByUsername($username)
    {
//         foreach (self::$users as $user) {
//             if (strcasecmp($user['username'], $username) === 0) {
//                 return new static($user);
//             }
//         }
        $user = self::find()
        ->where([
            "login" => $username
        ])
        ->one();
        if (!($user)) {
            return null;
        }
        $user->id = $user->staff_id;
        $user->username = $user->login;
        $user->password = $user->password_hash;
        $user->authKey = $user->password_hash;
        $user->accessToken = $user->password_hash;
        return new static($user);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->staff_id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
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
        return $this->password_hash === $password;
    }
}
