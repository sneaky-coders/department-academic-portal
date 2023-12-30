<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseContract */

$this->title = 'Update Purchase Contract';
$this->params['breadcrumbs'][] = ['label' => 'Purchase Contracts', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->purchase_contract_id, 'url' => ['view', 'id' => $model->purchase_contract_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="purchase-contract-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
