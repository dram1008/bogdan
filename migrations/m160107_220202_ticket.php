<?php

use yii\db\Schema;
use yii\db\Migration;

class m160107_220202_ticket extends Migration
{
    public function up()
    {
        $this->execute('ALTER TABLE galaxysss_1.bog_shop_requests CHANGE status status int;');
    }

    public function down()
    {
        echo "m160107_220202_ticket cannot be reverted.\n";

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
