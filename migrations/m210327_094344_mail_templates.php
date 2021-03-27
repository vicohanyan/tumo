<?php

use yii\db\Migration;

/**
 * Class m210327_094344_mail_templates
 */
class m210327_094344_mail_templates extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('mail_templates', [
            'id'    => $this->primaryKey(),
            'name'  => $this->string(200),
            'theme' => $this->string(),
            'body'  => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('mail_templates');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210327_094344_mail_templates cannot be reverted.\n";

        return false;
    }
    */
}
