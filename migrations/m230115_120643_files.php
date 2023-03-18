<?php

use yii\db\Migration;

/**
 * Class m230115_120643_files
 */
class m230115_120643_files extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('files', [
            'id' => $this->primaryKey(),
            'tasks_id' => $this->integer(),
            'files_name' => $this->string('255')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('files');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230115_120643_files cannot be reverted.\n";

        return false;
    }
    */
}
