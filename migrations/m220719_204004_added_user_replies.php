<?php

use yii\db\Migration;

/**
 * Class m220719_204004_single_task_user
 */
class m220719_204004_single_task_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_replies', [
            'id' => $this->primaryKey(),
            'dt_add' => $this->integer(),
            'rate' => $this->integer(),
            'description' => $this->string(),
            'photo' => $this->string(),
            'task_id' => $this->integer(),
            'price' => $this->integer(),
            'user_id' => $this->integer(),
            'executor_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_replies');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220719_204004_single_task_user cannot be reverted.\n";

        return false;
    }
    */
}
