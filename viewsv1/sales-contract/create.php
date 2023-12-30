<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SalesContract */

$this->title = 'Create Sales Contract';
$this->params['breadcrumbs'][] = ['label' => 'Sales Contracts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-contract-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
