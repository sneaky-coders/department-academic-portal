<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Day */

$this->title = 'Update Day: ' . $model->day_id;
$this->params['breadcrumbs'][] = ['label' => 'Days', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->day_id, 'url' => ['view', 'id' => $model->day_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="day-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
