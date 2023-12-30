<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OperationData */

$this->title = 'Update Operation Data: ' . $model->operation_data_id;
$this->params['breadcrumbs'][] = ['label' => 'Operation Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->operation_data_id, 'url' => ['view', 'id' => $model->operation_data_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="operation-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
