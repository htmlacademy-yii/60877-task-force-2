<?php

use yii\db\Migration;

/**
 * Class m230115_131236_tags_attribution
 */
class m230115_131236_tags_attribution extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tags_attribution', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'attributes_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tags_attribution');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230115_131236_tags_attribution cannot be reverted.\n";

        return false;
    }
    */
}
