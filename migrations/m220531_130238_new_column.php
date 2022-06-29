<?php

use yii\db\Migration;

/**
 * Class m220531_130238_new_column
 */
class m220531_130238_new_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tasks', 'user_id', $this->integer());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tasks', 'user_id');
    }
}
