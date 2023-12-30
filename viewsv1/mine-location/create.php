<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MineLocation */

$this->title = 'Create Mine Location';
$this->params['breadcrumbs'][] = ['label' => 'Mine Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mine-location-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
