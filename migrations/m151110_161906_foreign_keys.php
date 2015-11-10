<?php

use yii\db\Schema;
use yii\db\Migration;

class m151110_161906_foreign_keys extends Migration
{
    public function up()
    {
        $this->addForeignKey('section_post_post_fk', 'section_post', 'post', 'post', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('section_post_section_fk', 'section_post', 'section', 'section', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        echo "m151110_161906_foreign_keys cannot be reverted.\n";

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
