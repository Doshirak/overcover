<?php

use yii\db\Schema;
use yii\db\Migration;
use app\models\User;
use app\models\Post;
use app\models\Section;
use app\models\SectionPost;

class m151110_170029_test_data extends Migration
{
    public function up()
    {
        $admin = new User(['login' => 'admin', 'password' => 'admin', 'mail' => 'admin@admin.com', 'role' => 'admin', 'name' => 'admin']);
        $admin->save();
        $author = new User(['login' => 'author', 'password' => 'author', 'mail' => 'author@author.com', 'role' => 'author', 'name' => 'author']);
        $author->save();
        $post1 = new Post(['title' => 'post1', 'slug' => 'post1', 'text' => 'post1']);
        $post1->save();
        $post2 = new Post(['title' => 'post2', 'slug' => 'post2', 'text' => 'post2']);
        $post2->save();
        $post3 = new Post(['title' => 'post3', 'slug' => 'post3', 'text' => 'post3']);
        $post3->save();
        $section1 = new Section(['title' => 'section1', 'slug' => 'section1', 'text' => 'section1']);
        $section1->save();
        $section2 = new Section(['title' => 'section2', 'slug' => 'section2', 'text' => 'section2']);
        $section2->save();
        $link1 = new SectionPost(['section' => $section1->id, 'post' => $post1->id]);
        $link1->save();
        $link2 = new SectionPost(['section' => $section1->id, 'post' => $post2->id]);
        $link2->save();
        $link3 = new SectionPost(['section' => $section2->id, 'post' => $post3->id]);
        $link3->save();
    }

    public function down()
    {
        // echo "m151110_170029_test_data cannot be reverted.\n";

        return true;
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
