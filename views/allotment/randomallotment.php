<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Allotment Results';
?>

<div class="allotment-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success">
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php elseif (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger">
            <?= Yii::$app->session->getFlash('error') ?>
        </div>
    <?php endif; ?>

    <?= Html::a('Perform Random Allotment', ['random-allotment'], ['class' => 'btn btn-success']) ?>
</div>
