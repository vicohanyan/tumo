<?php

use yii\db\Migration;

/**
 * Class m210327_094421_mail_queue
 */
class m210327_094421_mail_queue extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('mail_queue', [
            'id'          => $this->primaryKey(),
            'student_id'  => $this->string(200),
            'template_id' => $this->string(200),
            'status'      => $this->tinyInteger(1),
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('mail_queue');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210327_094421_mail_queue cannot be reverted.\n";

        return false;
    }
    */
}
