<?php

use yii\db\Migration;

/**
 * Class m220929_150333_change
 */
class m220929_150333_change extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn("users", "dt_add", "integer");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn("users", "dt_add", "string");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220929_150333_change cannot be reverted.\n";

        return false;
    }
    */
}
