<?php

use yii\db\Migration;

/**
 * Class m230115_122444_profile
 */
class m230115_122444_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('profile', [
            'id' => $this->integer()->primaryKey()->notNull()->unique(),
            'address' => $this->string('255'),
            'bd' => $this->timestamp(),
            'about'=>$this->string('255'),
            'phone'=>$this->string('255'),
            'skype'=>$this->string('255'),
            'city_id'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('profile');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230115_122444_profile cannot be reverted.\n";

        return false;
    }
    */
}
