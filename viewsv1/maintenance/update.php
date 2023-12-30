<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Maintenance */

$this->title = 'Update Maintenance';
$this->params['breadcrumbs'][] = ['label' => 'Maintenances', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->date, 'url' => ['view', 'id' => $model->maintenance_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="maintenance-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
