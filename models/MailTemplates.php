<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "mail_templates".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $theme
 * @property string|null $body
 */
class MailTemplates extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail_templates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 200],
            [['theme', 'body'], 'string', 'max' => 255],
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
            'theme' => 'Theme',
            'body' => 'Body',
        ];
    }
}
