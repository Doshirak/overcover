<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $mail
 * @property string $role
 * @property string $name
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'password', 'mail', 'role', 'name'], 'required'],
            [['login', 'password', 'mail', 'role', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'mail' => 'Mail',
            'role' => 'Role',
            'name' => 'Name',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->password = hash('md5', $this->password);
            return true;
        } else {
            return false;
        }
    }

    public function afterSave($insert, $changedAttributes){
        parent::afterSave($insert, $changedAttributes);
        $auth = Yii::$app->authManager;
        $roles = $auth->getRoles();
        foreach($auth->getRolesByUser($this->id) as $role) {
            $auth->revoke($role, $this->id);
        }
        if (array_key_exists($this->role, $roles)) {
            $auth->assign($roles[$this->role], $this->id);
        } else {
            $auth->assign($roles['user'], $this->id);
        }
    }

    public static function findIdentity($id)
    {
        $user = User::find()->where(['id' => $id])->one();
        return $user;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public static function findByUsername($username)
    {
        $user = User::find()->where(['login' => $username])->one();
        return $user;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return false;
    }

    public function validatePassword($password)
    {
        return $this->password === hash('md5', $password);
    }
}
