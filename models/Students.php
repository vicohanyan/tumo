<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "students".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $lastname
 * @property string|null $username
 * @property string|null $password
 * @property string|null $email
 */
class Students extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'lastname'], 'string', 'max' => 200],
            [['username', 'password', 'email'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
        ];
    }
}
