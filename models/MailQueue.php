<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "mail_queue".
 *
 * @property int $id
 * @property string|null $student_id
 * @property string|null $template_id
 * @property int|null $status
 */
class MailQueue extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail_queue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'default', 'value' => null],
            [['status'], 'integer'],
            [['student_id', 'template_id'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'template_id' => 'Template ID',
            'status' => 'Status',
        ];
    }
}
