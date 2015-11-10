<?php

use yii\db\Schema;
use yii\db\Migration;

class m151108_113157_user extends Migration
{
    public function up()
    {
        $this->createTable('user', array(
            'id' => Schema::TYPE_PK,
            'login' => Schema::TYPE_STRING . ' NOT NULL',
            'password' => Schema::TYPE_STRING . ' NOT NULL',
            'mail' => Schema::TYPE_STRING . ' NOT NULL ',
            'role' => Schema::TYPE_STRING . ' NOT NULL'
        ));
    }

    public function down()
    {
        echo "m151108_113157_user cannot be reverted.\n";

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
