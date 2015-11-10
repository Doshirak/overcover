<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="header">
    <ul class="menu" id="top-menu">
        <li class="menu-item logo left">Logo</li>
        <li class="menu-item button left">Menu Item</li>
        <li class="menu-item button left">Menu Item</li>
        <li class="menu-item button left">Menu Item</li>
        <? if (!Yii::$app->user->isGuest) { ?>
            <li class="menu-item button left">
                <?= Html::beginForm(['site/logout'])?>
                <?= Html::input('submit', 'submit', 'Logout')?>
                <?= Html::endForm()?>
            </li>
        <? } ?>
        <li class="menu-item social right">Social</li>
        <li class="menu-item social right">Social</li>
        <li class="menu-item social right">Social</li>
        <div class="clear"></div>
    </ul>
</div>
        <?= $content ?>
<div class="footer">
    <span class="contact">Contact</span>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
