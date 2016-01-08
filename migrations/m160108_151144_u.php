<?php

use yii\db\Schema;
use yii\db\Migration;

class m160108_151144_u extends Migration
{
    public function up()
    {
        $this->execute('ALTER TABLE bog_shop_requests ADD last_message_time int NULL;');
    }

    public function down()
    {
        echo "m160108_151144_u cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
