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
        $this->createTable('user_rating', [
            'id' => $this->primaryKey(),
            'rating' => $this->integer(),
            'user_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_rating');
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
