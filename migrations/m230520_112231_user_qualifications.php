<?php

use yii\db\Migration;

/**
 * Class m230520_112231_user_qualifications
 */
class m230520_112231_user_qualifications extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_qualifications', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'category_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_qualifications');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230520_112231_user_qualifications cannot be reverted.\n";

        return false;
    }
    */
}
