<?php

use yii\db\Migration;

/**
 * Class m210627_000000_alter_city_id_column_in_task_table
 */
class m230627_203455_alter_city_id_column_in_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('task', 'city_id', $this->integer()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // возвращает столбец в его исходное состояние
        // замените это на нужный тип данных и ограничения
        $this->alterColumn('task', 'city_id', $this->integer()->notNull());
    }
}





