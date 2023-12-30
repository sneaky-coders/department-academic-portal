<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Consumption */

$this->title = 'Update Consumption';
$this->params['breadcrumbs'][] = ['label' => 'Consumptions', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->consumption_id, 'url' => ['view', 'id' => $model->consumption_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="consumption-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
