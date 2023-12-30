<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MineLocation */

$this->title = 'Update Mine Location';
$this->params['breadcrumbs'][] = ['label' => 'Mine Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->mine_location_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mine-location-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
