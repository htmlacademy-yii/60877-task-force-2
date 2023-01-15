<?php

use yii\db\Migration;

/**
 * Class m230115_141413_tasks_reply
 */
class m230115_141413_tasks_reply extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tasks_reply', [
            'id' => $this->integer()->primaryKey()->notNull()->unique(),
            'dt_add' => $this->timestamp(),
            'rate' => $this->integer(),
            'description' => $this->string('255'),
            'photo' => $this->string("255"),
            'task_id' => $this->integer(),
            'price' => $this->integer('255'),
            'user_id' => $this->integer(),
            'status' => $this->string(255),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tasks_reply');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230115_141413_tasks_reply cannot be reverted.\n";

        return false;
    }
    */
}
