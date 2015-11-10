<?php

use yii\db\Schema;
use yii\db\Migration;

class m151107_175117_post extends Migration
{
    public function up()
    {
        $this->createTable('post', array(
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'slug' => Schema::TYPE_STRING . ' NOT NULL',
            'text' => Schema::TYPE_TEXT,
            'date' => Schema::TYPE_DATE,
        ));
    }

    public function down()
    {
        echo "m151107_175117_post cannot be reverted.\n";

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
