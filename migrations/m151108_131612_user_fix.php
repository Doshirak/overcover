<?php

use yii\db\Schema;
use yii\db\Migration;

class m151108_131612_user_fix extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'name', Schema::TYPE_STRING . ' NOT NULL ');
    }

    public function down()
    {
        echo "m151108_131612_user_fix cannot be reverted.\n";

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
