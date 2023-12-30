<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RawMaterial */

$this->title = 'Update Raw Material: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Raw Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->raw_material_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="raw-material-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
