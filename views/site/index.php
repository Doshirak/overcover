<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<ul class="section-list">
    <?foreach ($sections as $section) {?>
        <li class="section">
            <h2><?=$section['section']->title?></h2>
            <ul class="posts-list">
                <?foreach ($section['posts'] as $post) {?>
                    <li class="post">
                        <h3><?=$post->title?></h3>
                    </li>
                    <?}?>
            </ul>
        </li>
    <?}?>
</ul>
