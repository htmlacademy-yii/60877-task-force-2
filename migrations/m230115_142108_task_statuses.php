<?php

use yii\db\Migration;

/**
 * Class m230115_142108_task_statuses
 */
class m230115_142108_task_statuses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tasks_reply', [
            'id' => $this->integer()->primaryKey()->notNull()->unique(),
            'task_id' => $this->integer(),
            'user_id' => $this->integer(),
            'statuses' => $this->string("255"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('task_statuses');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230115_142108_task_statuses cannot be reverted.\n";

        return false;
    }
    */
}
