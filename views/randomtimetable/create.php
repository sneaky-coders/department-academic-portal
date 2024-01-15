<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Randomtimetable */

$this->title = 'Create Randomtimetable';
$this->params['breadcrumbs'][] = ['label' => 'Randomtimetables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="randomtimetable-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
