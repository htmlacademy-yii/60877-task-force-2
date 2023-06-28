<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m230627_204623_add_user_status_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = \Yii::$app->db->schema->getTableSchema('user');
        if(isset($table->columns['user_status'])) {
            $this->dropColumn('{{%user}}', 'user_status');
        } else {
            echo "Column user_status is not exist in user table.\n";
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $table = \Yii::$app->db->schema->getTableSchema('user');
        if(!isset($table->columns['user_status'])) {
            $this->addColumn('{{%user}}', 'user_status', $this->integer());
        } else {
            echo "Column user_status already exists in user table.\n";
        }
    }
}
