<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DailyWorksSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="daily-works-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'daily_works_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'nature_of_job') ?>

    <?= $form->field($model, 'location') ?>

    <?= $form->field($model, 'mine_location') ?>

    <?php // echo $form->field($model, 'resources_employed') ?>

    <?php // echo $form->field($model, 'distance_travelled') ?>

    <?php // echo $form->field($model, 'vehicles_used') ?>

    <?php // echo $form->field($model, 'cost_incurred') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'is_delete') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
