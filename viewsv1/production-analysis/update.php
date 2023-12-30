<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductionAnalysis */

$this->title = 'Update Production Analysis: ' . $model->production_analysis_id;
$this->params['breadcrumbs'][] = ['label' => 'Production Analyses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->production_analysis_id, 'url' => ['view', 'id' => $model->production_analysis_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="production-analysis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
