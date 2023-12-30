<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Consumption */

$this->title = 'Create Consumption';
$this->params['breadcrumbs'][] = ['label' => 'Consumptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consumption-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
