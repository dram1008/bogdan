<?php

use yii\db\Schema;
use yii\db\Migration;

class m160103_153235_v1 extends Migration
{
    public function up()
    {
        $this->execute('ALTER TABLE bog_shop_requests ADD is_paid TINYINT(1) NULL;');
    }

    public function down()
    {
        echo "m160103_153235_v1 cannot be reverted.\n";

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
