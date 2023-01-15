<?php

use yii\db\Migration;

/**
 * Class m230115_144321_user_reply
 */
class m230115_144321_user_reply extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_rating', [
            'id' => $this->primaryKey(),
            'create_at' => $this->timestamp(),
            'rate' => $this->integer(),
            'description' => $this->string('255'),
            'task_id' => $this->integer(),
            'user_id' => $this->integer(),
            'executor_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_reply');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230115_144321_user_reply cannot be reverted.\n";

        return false;
    }
    */
}
