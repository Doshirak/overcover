<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\ImageForm;
/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->textInput(['class' => 'form-control dateForm']) ?>

    <?= Html::label('Section', 'section', ['class' => 'control-label']) ?>

    <?= Html::input('text', 'section', $section, ['class' => 'form-control', 'id' => 'section']) ?>

    <?= ImageForm::widget(['model' => $model, 'form' => $form]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
