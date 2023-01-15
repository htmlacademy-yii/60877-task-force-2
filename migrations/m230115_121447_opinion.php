<?php

use yii\db\Migration;

/**
 * Class m230115_121447_opinion
 */
class m230115_121447_opinion extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('opinion', [
            'id' => $this->primaryKey(),
            'dt_add' => $this->timestamp(),
            'rate' => $this->integer(),
            'description'=>$this->string('255')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('opinion');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230115_121447_opinion cannot be reverted.\n";

        return false;
    }
    */
}
