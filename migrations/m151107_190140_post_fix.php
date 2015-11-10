<?php

use yii\db\Schema;
use yii\db\Migration;

class m151107_190140_post_fix extends Migration
{
    public function up()
    {
        $this->addColumn('post', 'img', Schema::TYPE_STRING);
    }

    public function down()
    {
        echo "m151107_190140_post_fix cannot be reverted.\n";

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
