<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Timetable */

$this->title = 'Update Timetable: ' . $model->timetable_id;
$this->params['breadcrumbs'][] = ['label' => 'Timetables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->timetable_id, 'url' => ['view', 'id' => $model->timetable_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="timetable-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>