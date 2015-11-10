<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SectionPost */

$this->title = $model->post;
$this->params['breadcrumbs'][] = ['label' => 'Section Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section-post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'post' => $model->post, 'section' => $model->section], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'post' => $model->post, 'section' => $model->section], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'post',
            'section',
        ],
    ]) ?>

</div>
