<?php

use yii\db\Migration;

/**
 * Class m230615_201406_change_city_lat_long
 */
class m230615_201406_change_city_lat_long extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('city', 'latitude', $this->float());
        $this->alterColumn('city', 'longitude', $this->float());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230615_201406_change_city_lat_long cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230615_201406_change_city_lat_long cannot be reverted.\n";

        return false;
    }
    */
}
