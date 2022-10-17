<?php


namespace app\models;


use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class SearchUsers extends ActiveRecord implements IdentityInterface
{
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Электронная почта',
            'password' => 'Пароль',
        ];
    }


}