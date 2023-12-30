<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OperationData */

$this->title = 'Create Operation Data';
$this->params['breadcrumbs'][] = ['label' => 'Operation Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operation-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
