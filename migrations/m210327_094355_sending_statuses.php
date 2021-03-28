<?php

use yii\db\Migration;

/**
 * Class m210327_094355_sending_statuses
 */
class m210327_094355_sending_statuses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sending_statuses', [
            'id'        => $this->primaryKey(),
            'name'      => $this->string(),
        ]);
        $this->batchInsert("sending_statuses",
            [
                "id",'name'
            ],
            [
                ["0","Pending"],
                ["1","Sent"],
                ["2","Error"],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('sending_statuses');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210327_094355_sending_statuses cannot be reverted.\n";

        return false;
    }
    */
}
