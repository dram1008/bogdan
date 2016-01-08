<?php

use yii\db\Schema;
use yii\db\Migration;

class m160108_010751_ticket extends Migration
{
    public function up()
    {
        $this->execute('ALTER TABLE bog_shop_requests ADD phone VARCHAR(20) NULL;');
    }

    public function down()
    {
        echo "m160108_010751_ticket cannot be reverted.\n";

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
