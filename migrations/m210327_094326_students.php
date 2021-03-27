<?php

use yii\db\Migration;

/**
 * Class m210327_094326_students
 */
class m210327_094326_students extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('students', [
            'id'       => $this->primaryKey(),
            'name'     => $this->string(200),
            'lastname' => $this->string(200),
            'username' => $this->string(64),
            'password' => $this->string(64),
            'email'    =>  $this->string(64),
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('students');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210327_094326_students cannot be reverted.\n";

        return false;
    }
    */
}
