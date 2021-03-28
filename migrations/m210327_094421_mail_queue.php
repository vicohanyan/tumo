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
            'student_id'  => $this->integer(),
            'template_id' => $this->integer(),
            'status'      => $this->tinyInteger(1)->defaultValue(0),
        ]);
        $this->addForeignKey("student_id_FK","mail_queue","student_id","students","id","cascade","cascade");
        $this->addForeignKey("template_id_FK","mail_queue","template_id","mail_templates","id","cascade","cascade");
        $this->addForeignKey("status_id_FK","mail_queue","status","sending_statuses","id","cascade","cascade");
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
