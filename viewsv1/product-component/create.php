<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductComponent */

$this->title = 'Create Product Component';
$this->params['breadcrumbs'][] = ['label' => 'Product Components', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-component-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
