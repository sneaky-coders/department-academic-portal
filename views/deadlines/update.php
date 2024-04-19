<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Deadlines */

$this->title = 'Update Deadlines: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Deadlines', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="deadlines-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
