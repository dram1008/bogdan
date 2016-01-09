<?php

use yii\db\Schema;
use yii\db\Migration;

class m160109_181459_start extends Migration
{
    public function up()
    {
        $this->execute('ALTER TABLE galaxysss_1.bog_shop_requests_messages CHANGE status status int;');
    }

    public function down()
    {
        echo "m160109_181459_start cannot be reverted.\n";

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
