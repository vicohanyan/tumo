<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mail_templates".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $theme
 * @property string|null $body
 *
 * @property MailQueue[] $mailQueues
 */
class MailTemplates extends \yii\db\ActiveRecord
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

    /**
     * Gets query for [[MailQueues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMailQueues()
    {
        return $this->hasMany(MailQueue::className(), ['template_id' => 'id']);
    }
}
