<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mail_queue".
 *
 * @property int $id
 * @property int|null $student_id
 * @property string|null $student_ids
 * @property int|null $template_id
 * @property int|null $status
 * @property SendingStatuses $status0
 * @property MailTemplates $template
 * @property Students $student
 */
class MailQueue extends \yii\db\ActiveRecord
{

    public $student_ids;
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
            [['student_id', 'template_id', 'status','student_ids'], 'default', 'value' => null],
            [['student_id', 'template_id', 'status'], 'integer'],
            [['student_ids'], 'string'],
            [['template_id'], 'exist', 'skipOnError' => true, 'targetClass' => MailTemplates::className(), 'targetAttribute' => ['template_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => SendingStatuses::className(), 'targetAttribute' => ['status' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['student_id' => 'id']],
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
            'student_ids' => 'Student Ids',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Template]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTemplate()
    {
        return $this->hasOne(MailTemplates::className(), ['id' => 'template_id']);
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Students::className(), ['id' => 'student_id']);
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(SendingStatuses::className(), ['id' => 'status']);
    }

}
