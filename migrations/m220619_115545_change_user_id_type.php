<?php

use yii\db\Migration;

/**
 * Class m220619_115545_change_user_id_type
 */
class m220619_115545_change_user_id_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('tasks', 'user_id', $this->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220619_115545_change_user_id_type cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220619_115545_change_user_id_type cannot be reverted.\n";

        return false;
    }
    */
}
