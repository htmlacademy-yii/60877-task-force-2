<?php

use yii\db\Migration;

/**
 * Class m230307_214003_delete_rate_from_tasksreply
 */
class m230307_214003_delete_rate_from_tasksreply extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('tasks_reply', 'rate');
    }
}
