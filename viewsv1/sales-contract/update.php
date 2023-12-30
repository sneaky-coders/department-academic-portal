<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SalesContract */

$this->title = 'Update Sales Contract';
$this->params['breadcrumbs'][] = ['label' => 'Sales Contracts', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->sales_contract_id, 'url' => ['view', 'id' => $model->sales_contract_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sales-contract-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
