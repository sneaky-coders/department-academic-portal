<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dispatch */

$this->title = 'Create Dispatch';
$this->params['breadcrumbs'][] = ['label' => 'Dispatches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dispatch-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
