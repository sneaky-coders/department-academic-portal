<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Buyer */

$this->title = 'Update Buyer: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Buyers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->buyer_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="buyer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
