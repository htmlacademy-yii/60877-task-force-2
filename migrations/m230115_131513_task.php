<?php

use yii\db\Migration;

/**
 * Class m230115_131513_task
 */
class m230115_131513_task extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey(),
            'create_at' => $this->timestamp(),
            'category_id' => $this->integer(),
            'description' => $this->string('255'),
            'expire' => $this->date(),
            'name' => $this->string('255'),
            'address' => $this->string('255'),
            'budget' => $this->integer(),
            'latitude' => $this->decimal(65, 12),
            'longitude' => $this->decimal(65,12),
            'status' => $this->string('255'),
            'user_id' => $this->integer(),
            'executor_id' => $this->integer(),
            'without_author' => $this->boolean()->defaultValue(1)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('task');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230115_131513_task cannot be reverted.\n";

        return false;
    }
    */
}
