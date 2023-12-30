<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Operation */

$this->title = 'Update Daily Operations';
$this->params['breadcrumbs'][] = ['label' => 'Operations', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->operation_id, 'url' => ['view', 'id' => $model->operation_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="operation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
