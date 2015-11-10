<?php

use yii\db\Schema;
use yii\db\Migration;

class m151108_111047_section_post extends Migration
{
    public function up()
    {
        $this->createTable('section_post', array(
            'post' => Schema::TYPE_INTEGER . ' NOT NULL ',
            'section' => Schema::TYPE_INTEGER . ' NOT NULL '
        ));
        $this->addPrimaryKey('section_post_pk', 'section_post', ['post', 'section']);
    }

    public function down()
    {
        echo "m151108_111047_section_post cannot be reverted.\n";

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
