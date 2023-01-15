<?php

use yii\db\Migration;

/**
 * Class m230115_142640_user
 */
class m230115_142640_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'dt_add' => $this->timestamp(),
            'email' => $this->string('255'),
            'name' => $this->string('255'),
            'password_hash' => $this->string('255'),
            'user_img' => $this->string('255'),
            'quote' => $this->string('1000'),
            'country' => $this->string('255'),
            'city_id' => $this->integer(),
            'age' => $this->string('255'),
            'phone' => $this->string('255'),
            'telegram' => $this->string("255"),
            'status' => $this->integer(),
            'user_status' => $this->string("255"),
            'answer_orders' => $this->integer(),
            'category_id' => $this->integer(),
            'date_of_birth' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230115_142640_user cannot be reverted.\n";

        return false;
    }
    */
}
