<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Allotment */

$this->title = 'Create Allotment';
$this->params['breadcrumbs'][] = ['label' => 'Allotments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="allotment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
