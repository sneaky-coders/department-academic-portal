<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductGrade */

$this->title = 'Create Product Grade';
$this->params['breadcrumbs'][] = ['label' => 'Product Grades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-grade-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
