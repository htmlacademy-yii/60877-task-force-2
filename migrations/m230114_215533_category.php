<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m230114_215533_category
 */
class m230114_215533_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'icon' => $this->string(255),
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('category');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230114_215533_category cannot be reverted.\n";

        return false;
    }
    */
}
