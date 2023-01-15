<?php

use yii\db\Migration;

/**
 * Class m230115_115950_city
 */
class m230115_115950_city extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('city', [
            'id' => $this->integer()->primaryKey()->notNull()->unique(),
            'name' => $this->string(255),
            'latitude' => $this->integer(),
            'longitude' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('city');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230115_115950_city cannot be reverted.\n";

        return false;
    }
    */
}
