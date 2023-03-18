<?php

use yii\db\Migration;

/**
 * Class m230115_130213_tags_attribute
 */
class m230115_130213_tags_attribute extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tags_attribute', [
            'id' => $this->primaryKey(),
            'attributes' => $this->string('255'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tags_attribute');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230115_130213_tags_attribute cannot be reverted.\n";

        return false;
    }
    */
}
