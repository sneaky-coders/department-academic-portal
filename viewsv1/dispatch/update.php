<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dispatch */

$this->title = 'Update Dispatch';
$this->params['breadcrumbs'][] = ['label' => 'Dispatches', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->dispatch_id, 'url' => ['view', 'id' => $model->dispatch_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dispatch-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
