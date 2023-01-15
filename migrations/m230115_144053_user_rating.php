<?php

use yii\db\Migration;

/**
 * Class m230115_144053_user_rating
 */
class m230115_144053_user_rating extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_rating', [
            'id' => $this->integer()->primaryKey()->notNull()->unique(),
            'rating' => $this->integer(),
            'user_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_rating');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230115_144053_user_rating cannot be reverted.\n";

        return false;
    }
    */
}
