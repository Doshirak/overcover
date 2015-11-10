<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SectionPost */

$this->title = 'Update Section Post: ' . ' ' . $model->post;
$this->params['breadcrumbs'][] = ['label' => 'Section Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->post, 'url' => ['view', 'post' => $model->post, 'section' => $model->section]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="section-post-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
