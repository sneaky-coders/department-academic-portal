<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Consumables */

$this->title = 'Update Consumables Receipt';
$this->params['breadcrumbs'][] = ['label' => 'Consumables', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->consumables_id, 'url' => ['view', 'id' => $model->consumables_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="consumables-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
