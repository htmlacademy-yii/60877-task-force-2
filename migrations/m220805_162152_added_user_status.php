<?php

use yii\db\Migration;

/**
 * Class m220805_162152_added_user_status
 */
class m220805_162152_added_user_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'user_status', $this->text());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('users', 'user_status');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220805_162152_added_user_status cannot be reverted.\n";

        return false;
    }
    */
}
