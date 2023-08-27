<?php

use yii\db\Migration;

/**
 * Class m210615_000000_remove_user_status_from_user_table
 */
class m230615_203919_remove_user_status_from_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('user', 'user_status');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('user', 'user_status', $this->string(255));
    }
}