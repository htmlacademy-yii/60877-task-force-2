<?php

use yii\db\Migration;

/**
 * Class m230115_124449_replies_link
 */
class m230115_124449_replies_link extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('replies_link', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'replies_id' => $this->integer(),
            'task_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}s
     */
    public function safeDown()
    {
        $this->dropTable('replies_link');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230115_124449_replies_link cannot be reverted.\n";

        return false;
    }
    */
}
