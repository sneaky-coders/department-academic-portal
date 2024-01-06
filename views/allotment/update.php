<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Allotment */

$this->title = 'Update Allotment: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Allotments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="allotment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
