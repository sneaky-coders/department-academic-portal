<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DailyWorks */

$this->title = 'Update Daily Works/Jobs: ' . $model->date;
$this->params['breadcrumbs'][] = ['label' => 'Daily Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->date, 'url' => ['view', 'id' => $model->daily_works_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="daily-works-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
